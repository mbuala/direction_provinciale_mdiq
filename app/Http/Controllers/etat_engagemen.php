<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jury;
use App\Models\Offer;
use App\Models\etat_engagement;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
class etat_engagemen extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    function imprimer(Request $request){
        $request->validate([
            'art'=>'required',
            'nmarcher'=>'required',
            'parg'=>'required',
            'marchermantant'=>'required',
            'lign'=>'required',
            'marcheryc'=>'required',
            'netat'=>'required',
            'dejaengagercp'=>'required',
            'dejaengagerce'=>'required'

        ],
        [
         'required'=> 'Champs obligatoire' // custom message
        ]);
        $art=$request->input('art');
        $n_marcher=$request->input('nmarcher');
        $parg=$request->input('parg');
        $marcher_montant=$request->input('marchermantant');
        $lign=$request->input('lign');
        $marcher_yc=$request->input('marcheryc');
        $n_etat=$request->input('netat');
        $n_deja_engager_cp=$request->input('dejaengagercp');
        $n_deja_engager_ce=$request->input('dejaengagerce');
$code=$art.".".$parg.".".$lign;
$code_parg=$art.".".$parg;
$quer = DB::table('')->where('code', $code)->first();
if($quer){
    $slect_ar= DB::table('art')->where('Numero', $art)->first();
    $slect_parg= DB::table('pargs')->where('Numero', $code_parg)->first();
    // les calcules deja engager
    $row_one=$quer->cp-intval($n_deja_engager_cp);
    $row_two=$quer->ce-intval($n_deja_engager_ce);
    $row_one_one=0;

    $row_one_final=0;
    $row_two_final=0;

    if($row_one > 0 ){
        $row_one_one=$quer->cp-intval($n_deja_engager_cp);
        $row_two = $quer->ce-intval($n_deja_engager_ce);
    }
    elseif($row_one==0){
        $row_one_one=0;
        $row_two = $quer->ce-intval($n_deja_engager_ce);
    }

    elseif($row_one < 0){
        $row_one_one==0;
        $row_two = $row_two+$row_one;
     }


    $row_one_final=$row_one-intval($marcher_yc);
    $row_two_final=0;

    if( $row_one_final == 0){
        $row_one_final == 0;
        $row_two_final = $row_two;
    }

 elseif($row_one_final > 0){
        $row_one_final=$row_one-intval($marcher_yc);
        $row_two_final = $row_two;
    }

    elseif($row_one_final < 0){
        $row_two_final = $row_two+$row_one_final;
        $row_one_final = 0;
    }

          $templateProcessor = new TemplateProcessor( documentTemplate: 'Word-files/etat_engagement.docx');
          //$a ->setValue( search:'tst', $quer->objet);
          $templateProcessor->setValue( 'objet', $quer->objet);
          $templateProcessor->setValue( 'objet_art', $slect_ar->objet);
          $templateProcessor->setValue( 'objet_parg', $slect_parg->objet);
          $templateProcessor->setValue( 'cp', $quer->cp);
          $templateProcessor->setValue( 'ce', $quer->ce);
          $templateProcessor->setValue( 'art', $art);
          $templateProcessor->setValue( 'parg', $parg);
          $templateProcessor->setValue( 'lign', $lign);
          $templateProcessor->setValue( 'numero_marcher', $n_marcher);
          $templateProcessor->setValue( 'marcher_montant', $marcher_montant);
          $templateProcessor->setValue( 'marcher_yc', $marcher_yc);
          $templateProcessor->setValue( 'n_etat', $n_etat);
          $templateProcessor->setValue( 'cp_avant', $n_deja_engager_cp);
          $templateProcessor->setValue( 'ce_avant', $n_deja_engager_ce);

          $templateProcessor->setValue( 'cp_apre', $row_one_one);
          $templateProcessor->setValue( 'ce_apre', $row_two);

          $templateProcessor->setValue( 'cp_finale', $row_one_final);
          $templateProcessor->setValue( 'ce_finale', $row_two_final);


          $templateProcessor->saveAs( fileName: 'Etat_engagement.docx');
        return response()->download(file : 'Etat_engagement.docx')->deleteFileAfterSend(shouldDelete:true);
}
else{
    return redirect('/etat_engagement')->with('fail',"Nous n'avons pas trouver un budget avec L'article : $art et le paragraphe : $parg et la ligne : $lign que vous avez saisie");
}

/*
*/
    }
}
