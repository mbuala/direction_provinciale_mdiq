<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jury;
use App\Models\Offer;
use App\Models\avis;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
use DateTime;
class avi extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    function afficher_avis(){
        $data_avis = avis::all();
        return view('liste_avis',['avis'=>$data_avis]);
    }

    function afficher_ajouter_avis(){
        $data_offer = offer::all();
        return view('ajouter_avis',['data_offer'=>$data_offer]);
    }

    function ajouter__avis(Request $request){
        $request->validate([
            'num_avis'=>'required',
            'jours_avis'=>'required',
            'mois_avis'=>'required',
            'annee_avis'=>'required',
            'jours_ouver'=>'required',
            'mois_ouver'=>'required',
            'annee_ouver'=>'required',
            'heure_ouver'=>'required',
            'min_ouver'=>'required',
            'offer'=> 'required_without_all'

        ],
        [
         'required'=> 'Champs obligatoire' // custom message
        ],
        [
         'required_without_all'=>'Veuillez choisir une offre'
        ]);

        $debut = strtotime(''.$request->input('annee_avis').'-'.$request->input('mois_avis').'-'.$request->input('jours_avis').'');
$fin = strtotime(''.$request->input('annee_ouver').'-'.$request->input('mois_ouver').'-'.$request->input('jours_ouver').'');
$dif = ceil(abs($fin - $debut) / 86400);
if(intval($dif) > 21){
    $arr = $request->get('offer');

    $offe_num=implode(".",$arr);

$date_avis=$request->input('jours_avis')."/".$request->input('mois_avis')."/".$request->input('annee_avis');
$date_ouve=$request->input('jours_ouver')."/".$request->input('mois_ouver')."/".$request->input('annee_ouver');
$heure=$request->input('heure_ouver')." h ".$request->input('min_ouver');
    $query = DB::table('avis')->insert([
     'num_avis'=>$request->input('num_avis'),
     'date_avis'=>$date_avis,
     'date_ouverture'=>$date_ouve,
     'heure'=>$heure,
     'offe_num'=> $offe_num,
 ]);

 for($i = 0; $i < count($arr); $i++){
     DB::table('cps')->insert([
         //'num_avis'=>$request->input('num_avis'),
         'id'=>$arr[$i],
         'off_name'=>'not_important',
         'num_avis'=>$request->input('num_avis'),
     ]);

     DB::table('reglements')->insert([
         //'num_avis'=>$request->input('num_avis'),
         'id'=>$arr[$i],
         'off_name'=>'not_important',
         'num_avis'=>$request->input('num_avis'),
     ]);
    }
}
else{
    return redirect('/ajouter_avis')->with('faildate','La date d\'ouverture d\'avis doivent être plus de 21 jours par a port la date d\'avis');
}

if($query){
    return redirect('/liste_avis')->with('success','Vous avez ajouter une nouvelle avis');
 }else{
     return redirect('/liste_avis')->with('fail','Il y a un probleme,  veuillez ressayer');
 }


    }

    function supprimer_avis($id){
        $avis_num = DB::table('avis')->where('id', $id)->first();
        DB::delete('delete from cps where num_avis =  ?',[$avis_num->num_avis]);
        DB::delete('delete from reglements where num_avis =  ?',[$avis_num->num_avis]);
        DB::delete('delete from decisions where num_decision =  ?',[$avis_num->num_avis]);
        DB::delete('delete from convocations where id_decision =  ?',[$avis_num->num_avis]);
        $jr = avis::find($id);
        $jr->delete();
        return redirect('/liste_avis');
    }

    function mod_avis($id){
        $avis_info = DB::table('avis')->where('id', $id)->first();

        $qq=explode("/",$avis_info->date_avis);
        $avis_info->jours=$qq[0];
        $avis_info->mois=$qq[1];
        $avis_info->anne=$qq[2];
        $qqq=explode("/",$avis_info->date_ouverture);
        $avis_info->jours_ouver=$qqq[0];
        $avis_info->mois_ouver=$qqq[1];
        $avis_info->anne_ouver=$qqq[2];
        $tt=explode("h",$avis_info->heure);
        $avis_info->heure=$tt[0];
        $avis_info->minute=$tt[1];


        $offrename = $avis_info->offe_num;
        $offreid = explode(".", $offrename);
        $offre_table = array();// ce table contient les informations des offres qui ont dans cette avis
        $offre_facu = array();
        for ($i = 0; $i < count($offreid); $i++) {
            $aa = offer::find($offreid[$i]);
            $offre_facu[0]=$aa['Num'];
            $offre_facu[1]="kayn";
            $offre_facu[2]=$aa['id'];
            array_push($offre_table, $offre_facu);
        }

        $off_info = DB::table('offers')->get();
        for($a = 0; $a < count($off_info); $a++){
                     if(!in_array($off_info[$a]->id, $offreid)){
                        $offre_facu[0]=$off_info[$a]->Num;
                        $offre_facu[1]="m_kayn";
                        $offre_facu[2]=$off_info[$a]->id;
                        array_push($offre_table, $offre_facu);
                     }
        }

 return view('modifier_avis',['avis_info'=>$avis_info],['offre_table'=>$offre_table]);
    }

    function update_avis($id, Request $request){
        $avis_info = DB::table('avis')->where('id', $id)->first();


        $debut = strtotime(''.$request->input('annee_avis').'-'.$request->input('mois_avis').'-'.$request->input('jours_avis').'');
$fin = strtotime(''.$request->input('annee_ouver').'-'.$request->input('mois_ouver').'-'.$request->input('jours_ouver').'');
$dif = ceil(abs($fin - $debut) / 86400);
if(intval($dif) > 21){
    $arr = $request->get('offer');

    $offe_num=implode(".",$arr);

$date_avis=$request->input('jours_avis')."/".$request->input('mois_avis')."/".$request->input('annee_avis');
$date_ouve=$request->input('jours_ouver')."/".$request->input('mois_ouver')."/".$request->input('annee_ouver');
$heure=$request->input('heure_ouver')." h ".$request->input('min_ouver');
    $query = DB::update('update avis set num_avis = ?, date_avis = ?, date_ouverture = ?, heure = ?, offe_num = ?  where id = ?'
         ,[$request->input('num_avis'), $date_avis, $date_ouve, $heure, $offe_num, $id]);
         DB::delete('delete from cps where num_avis =  ?',[$request->input('num_avis')]);
         DB::delete('delete from reglements where num_avis =  ?',[$request->input('num_avis')]);
 for($i = 0; $i < count($arr); $i++){

    DB::table('cps')->insert([
        //'num_avis'=>$request->input('num_avis'),
        'id'=>$arr[$i],
        'off_name'=>'not_important',
        'num_avis'=>$request->input('num_avis'),
    ]);

    DB::table('reglements')->insert([
        //'num_avis'=>$request->input('num_avis'),
        'id'=>$arr[$i],
        'off_name'=>'not_important',
        'num_avis'=>$request->input('num_avis'),
    ]);
    }
}
else{
    return redirect('/ajouter_avis')->with('faildate','La date d\'ouverture d\'avis doivent être plus de 21 jours par a port la date d\'avis');
}

if($query){
    return redirect('/liste_avis')->with('vv','La modification a bien réussis');
 }else{
     return redirect('/liste_avis')->with('ff','Il y a un probleme,  veuillez ressayer');
 }



    }

    function imprimer_avis($id){
        $aviii = DB::table('avis')->where('id', $id)->first();
        $offrename = $aviii->offe_num;
        $offreid = explode(".", $offrename);
        $offre_table = array();// ce table contient les informations des offres qui ont dans cette avis
        $offre_facu = array();
        for ($i = 0; $i < count($offreid); $i++) {
            $aa = offer::find($offreid[$i]);
            $offre_facu[0]=$aa['Num'];
            $offre_facu[1]=$aa['objet'];
            $offre_facu[2]=$aa['caution'];
            $offre_facu[3]=$aa['estimation'];
            $offre_facu[4]=$aa['objet_ar'];
            array_push($offre_table, $offre_facu);
        }


        $templateProcessor = new TemplateProcessor( documentTemplate: 'Word-files/avis.docx');
        $templateProcessor->setValue( 'num_avis', $aviii->num_avis);
        $templateProcessor->setValue( 'date_ouverture', $aviii->date_ouverture);
        $templateProcessor->setValue( 'heure', $aviii->heure);
        $templateProcessor->cloneBlock('block_name', 0, true, false, $offre_table);
        $templateProcessor->cloneBlock('blockk', 0, true, false, $offre_table);

        $templateProcessor->saveAs( fileName: 'avis.docx');
      return response()->download(file : 'avis.docx')->deleteFileAfterSend(shouldDelete:true);



    }

}
