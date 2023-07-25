<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jury;
use App\Models\Offer;
use App\Models\avis;
use App\Models\cps;
use App\Models\decision;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
class decisio extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    function show(){
        $data_decision = decision::all();
        $tab_decision = array();
        $tab_decision_facultatif = array();
for($i = 0; $i < count($data_decision); $i++){
   $aa = DB::table('avis')->where('num_avis', $data_decision[$i]["num_decision"])->first();
   $tab_decision_facultatif['id']=$data_decision[$i]["id"];
    $tab_decision_facultatif['num']=$aa->num_avis;
    $tab_decision_facultatif['date_ouverture']=$aa->date_ouverture;
    $tab_decision_facultatif['heure']=$aa->heure;
    array_push($tab_decision, $tab_decision_facultatif);
}
return view('liste_decision',['decisions'=>$tab_decision]);
    }

    function supprimer_dec($id){
        $dec = decision::find($id);
        DB::delete('delete from convocations where id_decision =  ?',[$dec->num_decision]);
        $dec->delete();
        return redirect('/liste_decision')->with('success','La décision a été supprimer avec succéser');
    }


    function ajouter_afficher(){
      //
$juries_data= jury::all();
$avis_data= avis::all();
$decision_data = decision::all();
$avis_array=array();

foreach ($decision_data as $decision_datum){
    foreach ($avis_data as $avis_datum){
        if ($decision_datum["num_decision"]==$avis_datum["num_avis"]){
            unset($avis_datum);
        }
    }
}
//for($i = 0; $i < count($decision_data); $i++){
//        for($j = 0; $j < count($avis_data); $j++){
//            if($decision_data[$i]["num_decision"]==$avis_data[$j]["num_avis"]){
//                unset($avis_data[$j]);
//            }
//        }
//    }
return view('ajouter_decision',['aviss'=>$avis_data],['juries'=>$juries_data]);
    }

    function modifier_decision($id){
        //
        $decision_info = DB::table('decisions')->where('id', $id)->first();


$juriname = $decision_info->nom_juries;
$juriid = explode(".", $juriname);

$offre_table = array();
$offre_facu = array();
for ($i = 0; $i < count($juriid); $i++) {
    $aa = jury::find($juriid[$i]);
    $offre_facu[0]=$aa['Nom'];
    $offre_facu[1]="kayn";
    $offre_facu[2]=$aa['prenom'];
    $offre_facu[3]=$aa['qualiter'];
    $offre_facu[4]=$aa['id'];
    array_push($offre_table, $offre_facu);
}

$off_info = DB::table('juries')->get();
for($a = 0; $a < count($off_info); $a++){
    if(!in_array($off_info[$a]->id, $juriid)){
        $offre_facu[0]=$off_info[$a]->Nom;
        $offre_facu[1]="m_kayn";
        $offre_facu[2]=$off_info[$a]->prenom;
        $offre_facu[3]=$off_info[$a]->qualiter;
        $offre_facu[4]=$off_info[$a]->id;
       array_push($offre_table, $offre_facu);
    }
}
return view('modifier_decision',['juries'=>$offre_table],['decision_info'=>$decision_info]);
      }
      function mdd_dec($id,Request $request){


        $request->validate([
            'jeri'=> 'required_without_all',
            'num_avis'=>'required'
        ],
        [
         'jeri.required_without_all'=>'Vous Devez Choisir au moins un juri',
         'num_avis.required'=>'Vous Devez Choisirau max  une Avis'
        ]);

        $arr = $request->get('jeri');

        $juri_num=implode(".",$arr);
        $query = DB::update('update decisions set num_decision = ?, nom_juries = ? where id = ?'
         ,[$request->input('num_avis'), $juri_num, $id]);

         DB::delete('delete from convocations where id_decision =  ?',[$request->input('num_avis')]);
        $quer = DB::table('convocations')->insert([
            'id_decision'=>$request->input('num_avis'),
        ]);

        if($query){
            return redirect('/liste_decision')->with('mdsucsser','La décision a été bien Modifier');
         }else{
             return redirect('/liste_decision')->with('mdfail','Il y a un probleme,  veuillez ressayer');
         }


      }
    function ajouter(Request $request){

        $request->validate([
            'jeri'=> 'required_without_all',
            'num_avis'=>'required'
        ],
        [
         'jeri.required_without_all'=>'Vous Devez Choisir au moins un juri',
         'num_avis.required'=>'Vous Devez Choisirau max  une Avis'
        ]);

        $arr = $request->get('jeri');

        $juri_num=implode(".",$arr);

        $query = DB::table('decisions')->insert([
            'num_decision'=>$request->input('num_avis'),
            'nom_juries'=>$juri_num,
        ]);

        $quer = DB::table('convocations')->insert([
            'id_decision'=>$request->input('num_avis'),
        ]);

        if($query){
            return redirect('/liste_decision')->with('valider','La décision a été bien ajouter');
         }else{
             return redirect('/liste_decision')->with('fail','Il y a un probleme,  veuillez ressayer');
         }

  return view('ajouter_decision',['juries'=>$juries_data],['aviss'=>$avis_data]);
      }


      function imprimer_dec($id){
        //
        $dec = DB::table('decisions')->where('id', $id)->first();
        $jurie_table = array();
        $jurie_table_facu = array();

        $offre_table = array();
        $offre_table_facu = array();

// Trouver les jurie
$juri_num=explode(".", $dec->nom_juries);
for($i=0;$i<count($juri_num);$i++){
    $aa=jury::find($juri_num[$i]);
    $jurie_table_facu[0]=$aa['Nom'];
    $jurie_table_facu[1]=$aa['prenom'];
    $jurie_table_facu[2]=$aa['profession'];
    $jurie_table_facu[3]=$aa['qualiter'];
    array_push($jurie_table, $jurie_table_facu);
}
//
// Trouver l'avis
$avis = DB::table('avis')->where('num_avis', $dec->num_decision)->first();
//
// Trouver offre
$offre_num=explode(".", $avis->offe_num);
for($i=0;$i<count($offre_num);$i++){
    $aa=offer::find($offre_num[$i]);
    $offre_table_facu['num_offre']=$aa['Num'];
    $offre_table_facu['objet_offre']=$aa['objet'];
    array_push($offre_table, $offre_table_facu);
}
//

$templateProcessor = new TemplateProcessor( documentTemplate: 'Word-files/decisions.docx');

$templateProcessor->setValue( 'num_avis', $dec->num_decision);
$templateProcessor->setValue( 'date_avis_ouver', $avis->date_ouverture);
//$templateProcessor->setValue( 'heure_avis', $quer->objet);
$templateProcessor->cloneBlock('block_juries', 0, true, false, $jurie_table);
$templateProcessor->cloneBlock('block_offre', 0, true, false, $offre_table);

$templateProcessor->cloneBlock('blockk_juries', 0, true, false, $jurie_table);
$templateProcessor->cloneBlock('blockk_offre', 0, true, false, $offre_table);

$templateProcessor->saveAs( fileName: 'decisions.docx');
return response()->download(file : 'decisions.docx')->deleteFileAfterSend(shouldDelete:true);
      }

}
