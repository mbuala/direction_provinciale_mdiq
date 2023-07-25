<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jury;
use App\Models\Offer;
use App\Models\decision;
use App\Models\avis;
use Illuminate\Support\Facades\DB;
class jurii extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    function show(){
        $data_jury = jury::all();
        return view('liste_juri',['juries'=>$data_jury]);
    }


    function afficher_ajouter(){
     //   $data_jury = jury::all();
         $pre=DB::table('juries')->where('qualiter', "Président")->first();
         if(empty($pre)){
            $a=" ";
             return view('ajouter_juri',['a'=>$a]);
         }
         else{
             $a="disabled";
            return view('ajouter_juri',['a'=>$a]);
         }

      //  return view('ajouter_juri');
    }
    function ajouter(Request $request){
        //return view('ajouter_juri');
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'profession'=>'required'

        ],
        [
         'required'=> 'Champs obligatoire' // custom message
        ]);

        $query = DB::table('juries')->insert([
            'Nom'=>$request->input('nom'),
            'prenom'=>$request->input('prenom'),
            'profession'=>$request->input('profession'),
            'qualiter'=>$request->input('President')
        ]);
if($query){
   return redirect('/liste_jury')->with('val','Les informations sont enregistrer');
}else{
    return redirect('/liste_jury')->with('nonval','Il y a un probleme, veuillez ressayer');
}

    }

    function Update($id){
        $jurry = jury::find($id);
        return view('modifier_juri',['jurie'=>$jurry]);
    }

    function Updated(Request $request,$id){
       // $jurry = jury::find($id);
        $jurry_Nom = $request->input('nom');
        $jurry_prenom = $request->input('prenom');
        $jurry_profession = $request->input('profession');
        $jurry_qualiter = $request->input('qualiter');
        DB::update('update juries set nom = ?, prenom = ?, profession = ?, qualiter = ? where id = ?',[$jurry_Nom, $jurry_prenom, $jurry_profession, $jurry_qualiter, $id]);
        return redirect('/liste_jury');
    }

    function supprimer($id){

    $data_decision = decision::all();
    $string=".$id";
for($i = 0; $i < count($data_decision); $i++){
    $juri_id=explode(".", $data_decision[$i]['nom_juries']);
    if(count($juri_id)==1){
        if($juri_id[0]==$id){
            DB::delete('delete from decisions where id =  ?',[$data_decision[$i]['id']]);
            DB::delete('delete from convocations where id_decision =  ?',[$data_decision[$i]['num_decision']]);
        }
    }
    else{
        for($j = 0; $j < count($juri_id); $j++){
if($juri_id[$j]==$id){
    unset($juri_id[$j]);
}
        }
        $final_jurii=implode(".", $juri_id);
        DB::update('update decisions set nom_juries= ? where id = ?',[$final_jurii,$data_decision[$i]['id']]);
    }

}
        $jr = jury::find($id);
        $jr->delete();
        return redirect('/liste_jury');
        //return "Rien";
    }
    function show_off(){
        $data_offer = offer::all();
        return view('liste_offre',['data_offer'=>$data_offer]);
    }

    function ajouter_off(Request $request){
        $request->validate([
            'num_off'=>'required',
            'caution'=>'required',
            'estimation'=>'required',
            'objet'=>'required',
            'objetar'=>'required'
        ],
        [
         'required'=> 'Champs obligatoire' // custom message
        ]);
         $query = DB::table('offers')->insert([
            'Num'=>$request->input('num_off'),
            'caution'=>$request->input('caution'),
            'estimation'=>$request->input('estimation'),
            'objet'=>$request->input('objet'),
            'objet_ar'=>$request->input('objetar'),
            'path_file'=>'none',
        ]);
        if($query){
            return redirect('/liste_offre')->with('success','offre à bien ajouter');
         }else{
             return redirect('/liste_offre')->with('fail','Il y a un probleme,  veuillez ressayer');
         }

    }

    function afficher_md($id){
        $md = offer::find($id);
        return view('modifier_offre',['md'=>$md]);
    }

    function mdoff(Request $request,$id){
        // $jurry = jury::find($id);

         $jurry_Num = $request->input('num');
         $jurry_caution = $request->input('caution');
         $jurry_estimation = $request->input('estimation');
         $jurry_objet = $request->input('objet');
         $jurry_objet_ar = $request->input('objet_ar');
         $jurry_file = $request->input('bord');
         DB::update('update offers set Num = ?, caution = ?, estimation = ?, objet = ?, objet_ar = ?  where id = ?'
         ,[$jurry_Num, $jurry_caution, $jurry_estimation, $jurry_objet, $jurry_objet_ar, $id]);
         return redirect('/liste_offre');
     }
     function supprimerOff($id){

        $jr = offer::find($id);
        $data_decision = avis::all();

        $string=".$id";
        for($i = 0; $i < count($data_decision); $i++){
            $juri_id=explode(".", $data_decision[$i]['offe_num']);
            if(count($juri_id)==1){
                if($juri_id[0]==$id){
                    DB::delete('delete from avis where id =  ?',[$data_decision[$i]['id']]);
                    DB::delete('delete from decisions where num_decision =  ?',[$data_decision[$i]['num_avis']]);
                    DB::delete('delete from convocations where id_decision =  ?',[$data_decision[$i]['num_avis']]);

        DB::delete('delete from cps where id =  ?',[$id]);
        DB::delete('delete from reglements where id =  ?',[$id]);
                }
            }
            else{
                for($j = 0; $j < count($juri_id); $j++){
        if($juri_id[$j]==$id){
            unset($juri_id[$j]);
            DB::delete('delete from cps where id =  ?',[$id]);
        DB::delete('delete from reglements where id =  ?',[$id]);
        }
                }
                $final_jurii=implode(".", $juri_id);
                DB::update('update avis set offe_num= ? where id = ?',[$final_jurii,$data_decision[$i]['id']]);
            }

        }

        DB::delete('delete from first_pvs where id_offer =  ?',[$id]);
        DB::delete('delete from concurrents where id_offer =  ?',[$id]);
        DB::delete('delete from pv_deuxes where num_offer =  ?',[$id]);
        DB::delete('delete from pv_trois where num_offer =  ?',[$id]);


        $jr->delete();
        return redirect('/liste_offre');
    }

}
