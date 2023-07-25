<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jury;
use App\Models\Offer;
use App\Models\avis;
use App\Models\cps;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
class cp extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
 function afficher(){
    $data_cps = cps::all();
    $offre_table = array();
    $offre_facu = array();
for($i = 0; $i < count($data_cps); $i++){
    $aa = offer::find($data_cps[$i]['id']);
    $offre_facu['id']=$aa['id'];
    $offre_facu['num']=$aa['Num'];
    $offre_facu['objet']=$aa['objet'];
    $offre_facu['avis']=$data_cps[$i]['num_avis'];
    array_push($offre_table, $offre_facu);
}

return view('liste_cps',['offer'=>$offre_table]);


 }

 function imprimerr($id){

 $offre = DB::table('offers')->where('id', $id)->first();
 $cps = DB::table('cps')->where('id', $id)->first();
 $aviii = DB::table('avis')->where('num_avis', $cps->num_avis)->first();
 $pv3 = DB::table('pv_trois')->where('num_offer', $id)->first();




 $templateProcessor = new TemplateProcessor( documentTemplate: 'Word-files/cps.docx');
 $templateProcessor->setValue( 'num_offre', $offre->Num);
 $templateProcessor->setValue( 'objet', $offre->objet);
 $templateProcessor->setValue( 'caution', $offre->caution);
 $templateProcessor->setValue( 'date_avis', $aviii->date_ouverture);

     if ($pv3){
         $idgagant=$pv3->id_gagnant;
         $gagant = DB::table('concurrents')->where('id', $idgagant)->first();

         $nom_gagant=$gagant->Nom;
         $name_gerant=$pv3->Nom_gerant;
         $adresse=$pv3->adresse;
         $cnss=$pv3->Num_cnss;
         $rib=$pv3->RIB;
         $banque=$pv3->banque;
         $registre=$pv3->registre;

         $templateProcessor->setValue( 'nom_gagnant', $nom_gagant);
         $templateProcessor->setValue( 'gerant', $name_gerant);
         $templateProcessor->setValue( 'adresse', $adresse);
         $templateProcessor->setValue( 'cnss', $cnss);
         $templateProcessor->setValue( 'rib', $rib);
         $templateProcessor->setValue( 'banque', $banque);
         $templateProcessor->setValue( 'registre', $registre);
     }

     else{
         $templateProcessor->setValue( 'nom_gagnant', "......................");
         $templateProcessor->setValue( 'gerant', "......................");
         $templateProcessor->setValue( 'adresse', "......................");
         $templateProcessor->setValue( 'cnss', "......................");
         $templateProcessor->setValue( 'rib', "......................");
         $templateProcessor->setValue( 'banque', "......................");
         $templateProcessor->setValue( 'registre', "......................");
     }

 $templateProcessor->saveAs( fileName: 'cps.docx');
 return response()->download(file : 'cps.docx')->deleteFileAfterSend(shouldDelete:true);

 }

}
