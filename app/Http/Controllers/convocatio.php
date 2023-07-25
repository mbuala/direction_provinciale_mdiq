<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jury;
use App\Models\Offer;
use App\Models\avis;
use App\Models\cps;
use App\Models\decision;
use App\Models\convocation;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
class convocatio extends Controller
{
//
public function __construct()
    {
        $this->middleware('auth');
    }
    function afficher(){
        $data_concocation = convocation::all();
        $avis_table=array();
        $avis_table_facul=array();

        for($i = 0; $i < count($data_concocation); $i++){
            $aviii = DB::table('avis')->where('num_avis', $data_concocation[$i]->id_decision)->first();
            $avis_table_facul['id']=$aviii->id;
            $avis_table_facul['num']=$aviii->num_avis;
            $avis_table_facul['date_ouverture']=$aviii->date_ouverture;
            $avis_table_facul['heure']=$aviii->heure;
            array_push($avis_table, $avis_table_facul);
        }

        return view('liste_convocation',['aviii'=>$avis_table]);
    }

    function imprimer($id){
$juries=array();
$juries_facultatif=array();

$offre_table = array();
$offre_table_facu = array();
       // trouver id
       $aviii = DB::table('avis')->where('id', $id)->first();
// trouver juries
$dec = DB::table('decisions')->where('num_decision', $aviii->num_avis)->first();
$decjuries = $dec->nom_juries;


        $jureis_id = explode(".", $decjuries);


        for($i=0;$i<count($jureis_id);$i++){
            $jr = DB::table('juries')->where('id', $jureis_id[$i])->first();
$juries_facultatif[0]=$jr->Nom;
$juries_facultatif[1]=$jr->prenom;
$juries_facultatif[2]=$jr->profession;
array_push($juries, $juries_facultatif);
        }
// trouver les offres
$offre_num=explode(".", $aviii->offe_num);
for($i=0;$i<count($offre_num);$i++){
    $aa=offer::find($offre_num[$i]);
    $offre_table_facu['num_offre']=$aa['Num'];
    $offre_table_facu['objet_offre']=$aa['objet'];
    array_push($offre_table, $offre_table_facu);
}

$templateProcessor = new TemplateProcessor( documentTemplate: 'Word-files/convencation.docx');

$templateProcessor->setValue( 'num_avis', $dec->num_decision);
$templateProcessor->setValue( 'date_avis_ouver', $aviii->date_ouverture);
$templateProcessor->setValue( 'heure_avis', $aviii->heure);

$templateProcessor->cloneBlock('block_juries', 0, true, false, $juries);
$templateProcessor->cloneBlock('block_offre', 0, true, false, $offre_table);


$templateProcessor->saveAs( fileName: 'convencation.docx');
return response()->download(file : 'convencation.docx')->deleteFileAfterSend(shouldDelete:true);

    }

}
