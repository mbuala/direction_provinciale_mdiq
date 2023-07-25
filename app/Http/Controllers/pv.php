<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jury;
use App\Models\Offer;
use App\Models\avis;
use App\Models\cps;
use App\Models\reglement;
use App\Models\concurrents;
use App\Models\first_pv;
use App\Models\jounal_matin;
use App\Models\jounal_sahara;
use App\Models\notification;
use App\Models\Order_service;
use App\Models\pv_deux;
use App\Models\pv_trois;
use App\Models\decision;
use App\Models\rapport_presentation;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\View;
use Config;
class pv extends Controller
{
    //
   // global $table_journaux;
   public function __construct()
    {
        $this->middleware('auth');
    }
    function afficher_offre(){
        $data_avis = avis::all();
        $offre_table = array();
        $offre_facu = array();
        $first_pv = DB::table('first_pvs')->get();
        $pv_deux = DB::table('pv_deuxes')->get();
        $pv_trois = DB::table('pv_trois')->get();
        $decision_data = decision::all();



for($x=0;$x<count($decision_data);$x++){
for($i = 0; $i < count($data_avis); $i++){
if($decision_data[$x]['num_decision']==$data_avis[$i]['num_avis']){
    $arr=explode(".", $data_avis[$i]['offe_num']);
   // $a=count($arr);
   if(count($arr)==1){
    $offre = offer::find($arr[0]);
    $offre_facu[0]=$offre['Num'];
    $offre_facu[1]=$data_avis[$i]['date_ouverture'];
    $offre_facu[2]=$data_avis[$i]['heure'];
    $offre_facu[3]=$offre->id.'_'.$data_avis[$i]['id'];
    // tester s'il y a les pv !!!
for($k=0;$k<count($first_pv);$k++){
    if($first_pv[$k]->id_offer==$offre->id && $first_pv[$k]->id_avis==$data_avis[$i]->id){
        $offre_facu[4]="pv_one_existe";
        break;
    }
    else{
        $offre_facu[4]="rien_pv_one";
    }
}

for($a=0;$a<count($pv_deux);$a++){
    if($pv_deux[$a]->num_offer==$offre->id && $pv_deux[$a]->id_avis==$data_avis[$i]->id){
        $offre_facu[4]="pv_one_existee";
        $offre_facu[5]="pv_deux_existe";
        break;
    }

}

for($b=0;$b<count($pv_trois);$b++){
    if($pv_trois[$b]->num_offer==$offre->id){
        $offre_facu[6]="pv_trois_existe";
        break;
    }
    else{
        unset($offre_facu[6]);
    }
}



    array_push($offre_table, $offre_facu);
   }
   else{
    for($j = 0; $j < count($arr); $j++){
        $offre = offer::find($arr[$j]);
        $offre_facu[0]=$offre['Num'];
        $offre_facu[1]=$data_avis[$i]['date_ouverture'];
        $offre_facu[2]=$data_avis[$i]['heure'];
        $offre_facu[3]=$offre->id.'_'.$data_avis[$i]['id'];
        for($k=0;$k<count($first_pv);$k++){
            if($first_pv[$k]->id_offer==$offre->id && $first_pv[$k]->id_avis==$data_avis[$i]->id){
                $offre_facu[4]="pv_one_existe";
            }
            else{
                $offre_facu[4]="rien_pv_one";
            }
        }

        for($a=0;$a<count($pv_deux);$a++){
            if($pv_deux[$a]->num_offer==$offre->id && $pv_deux[$a]->id_avis==$data_avis[$i]->id){
                $offre_facu[4]="pv_one_existee";
                $offre_facu[5]="pv_deux_existe";
            }

        }

        for($b=0;$b<count($pv_trois);$b++){
            if($pv_trois[$b]->num_offer==$offre->id){
                $offre_facu[6]="pv_trois_existe";
                break;
            }
            else{
                unset($offre_facu[6]);
            }
        }


        array_push($offre_table, $offre_facu);
       }
   }
}
}
        }

     return view('process_verbal',['offer'=>$offre_table]);
    }



    function pageone_pv1($id){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        return view('pv/pvone_one',['offers'=>$offre],['aviss'=>$avis]);
       //return $avis;
    }

    function pagetwo_pv1($id,Request $request){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();

         $table_journaux=array();
// Insere les journaux
$request->validate([
    'num_matin'=>'required',
    'date_matin'=>'required',
    'page_matin'=>'required',
    'num_sahara'=>'required',
    'date_sahara'=>'required',
    'page_sahara'=>'required'
],
[
 'required'=> 'Champs obligatoire',
  'required_without_all'=>  'Vous devez choissis le type du journal'// custom message
]);
$jj='normal';




$normal_matin=DB::table('jounal_matins')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('etat', "normal")->first();
$normal_sahara=DB::table('jounal_saharas')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('etat', "normal")->first();
if(empty($normal_matin) && empty($normal_sahara)){
DB::table('jounal_matins')->insert([
    //'num_avis'=>$request->input('num_avis'),
    'id_offer'=>$ids[0],
    'id_avis'=>$ids[1],
    'numero_journal'=>$request->input('num_matin'),
    'Date'=>$request->input('date_matin'),
    'Page_num'=>$request->input('page_matin'),
    'etat'=>"normal",
]);

DB::table('jounal_saharas')->insert([
    //'num_avis'=>$request->input('num_avis'),
    'id_offer'=>$ids[0],
    'id_avis'=>$ids[1],
    'numero_journal'=>$request->input('num_sahara'),
    'Date'=>$request->input('date_sahara'),
    'Page_num'=>$request->input('page_sahara'),
    'etat'=>"normal",
]);
     }
else{
    DB::update('update jounal_matins set numero_journal = ?, Date = ?, Page_num = ?, etat = ? where id_offer = ? and id_avis = ?'
    ,[$request->input('num_matin'), $request->input('date_matin'), $request->input('page_matin'), $jj , $ids[0], $ids[1]]);
    DB::update('update jounal_saharas set numero_journal = ?, Date = ?, Page_num = ?, etat = ? where id_offer = ? and id_avis = ?'
    ,[$request->input('num_matin'), $request->input('date_sahara'), $request->input('page_sahara'), $jj , $ids[0], $ids[1]]);
}

        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;

        return view('pv/pvone_one_rec',['offers'=>$offre],['aviss'=>$avis]);
       // return view('pv/pvone_two',['offers'=>$offre],['aviss'=>$avis]);
       //return $offre;
    }



    function pagetwo_pv1_rec($id,Request $request){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();

         $table_journaux=array();
// Insere les journaux
$request->validate([
    'num_matin'=>'required',
    'date_matin'=>'required',
    'page_matin'=>'required',
    'num_sahara'=>'required',
    'date_sahara'=>'required',
    'page_sahara'=>'required'
],
[
 'required'=> 'Champs obligatoire',
  'required_without_all'=>  'Vous devez choissis le type du journal'// custom message
]);
$jj='rectificatif';



$normal_matin=DB::table('jounal_matins')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('etat', "rectificatif")->first();
$normal_sahara=DB::table('jounal_saharas')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('etat', "rectificatif")->first();
if(empty($normal_matin) && empty($normal_sahara)){
DB::table('jounal_matins')->insert([
    //'num_avis'=>$request->input('num_avis'),
    'id_offer'=>$ids[0],
    'id_avis'=>$ids[1],
    'numero_journal'=>$request->input('num_matin'),
    'Date'=>$request->input('date_matin'),
    'Page_num'=>$request->input('page_matin'),
    'etat'=>"rectificatif",
]);

DB::table('jounal_saharas')->insert([
    //'num_avis'=>$request->input('num_avis'),
    'id_offer'=>$ids[0],
    'id_avis'=>$ids[1],
    'numero_journal'=>$request->input('num_sahara'),
    'Date'=>$request->input('date_sahara'),
    'Page_num'=>$request->input('page_sahara'),
    'etat'=>"rectificatif",
]);
     }
else{
    DB::update('update jounal_matins set numero_journal = ?, Date = ?, Page_num = ?, etat = ? where id_offer = ? and id_avis = ?'
    ,[$request->input('num_matin'), $request->input('date_matin'), $request->input('page_matin'), $jj , $ids[0], $ids[1]]);
    DB::update('update jounal_saharas set numero_journal = ?, Date = ?, Page_num = ?, etat = ? where id_offer = ? and id_avis = ?'
    ,[$request->input('num_matin'), $request->input('date_sahara'), $request->input('page_sahara'), $jj , $ids[0], $ids[1]]);
}

        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;

         return view('pv/pvone_two',['offers'=>$offre],['aviss'=>$avis]);
       //return $offre;
    }






    function pagetw_pv1($id,Request $request){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        return view('pv/pvone_two',['offers'=>$offre],['aviss'=>$avis]);
    }

    function pageone_rec($id,Request $request){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        return view('pv/pvone_one_rec',['offers'=>$offre],['aviss'=>$avis]);
    }

    function pagethree_pv1($id,Request $request){
        $concurrent=$request->input('concurrent');
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        $avis->concurrent=$concurrent;
        return view('pv/pvone_three',['offers'=>$offre],['aviss'=>$avis]);
       //return $offre;

    }

    function pagefour_pv1($id,Request $request){
        $concurrent=$request->input('hiddeninput');
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $info_table = array();// ce table contient les informations des concurrents
        $info_facu = array();
        $nom_concurrent=$request->input("n");

        for($i=1;$i<=$concurrent;$i++){
            $count=$i-1;
            $info_facu['p']=$request->input("p$i");
            $info_facu['d']=$request->input("d$i");
            $info_facu['ex']=$request->input("ex$i");
            array_push($info_table, $info_facu);


        }


//Insertion

for($i=0;$i<$concurrent;$i++){

$nom=$nom_concurrent[$i];
$p=json_encode($info_table[$i]['p']);
$d=json_encode($info_table[$i]['d']);
$ex=json_encode($info_table[$i]['ex']);
$concu=DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('Nom', $nom)->first();
if(empty($concu)){
DB::table('concurrents')->insert([
    //'num_avis'=>$request->input('num_avis'),
    'id_offer'=>$ids[0],
    'id_avis'=>$ids[1],
    'Nom'=>$nom,
    'Postuler'=>$p,
    'Dossier_complet'=>$d,
    'existe'=>$ex,
    'eliminer'=>"null",
    'Motif'=>"null",
    'reserver'=>"null",
    'objet_reserve'=>"null",
    'Mantant_dactes'=>"null",
]);
}
else{
    DB::update('update concurrents set Postuler = ?, Dossier_complet = ?, existe = ?  where id_offer = ? and id_avis = ? and Nom = ?'
    ,[$p, $d, $ex, $ids[0], $ids[1], $nom]);
}
}
//

        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        $avis->concu=$concurrent;
        return view('pv/pvone_four',['concurrents'=>$nom_concurrent],['aviss'=>$avis]);
        //return view('pv/pvone_three',['concurrents'=>$nom_concurrent],['aviss'=>$avis]);
    }

    function pagefive_pv1($id,Request $request){
        $nom_concurrents=$request->input("noms");
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;

        $noms=$request->input('noms');
        $info_table = array();// ce table contient les informations des concurrents
        $info_facu = array();
        for($i=1;$i<=count($noms);$i++){
            $aa=$request->input("el$i");
            $bb=$request->input("motif$i");
            if(!empty($aa)){
                DB::update('update concurrents set eliminer = ?, Motif = ? where id_offer = ? and id_avis = ? and Nom = ?'
            ,[$aa, $bb, $ids[0], $ids[1], $noms[$i-1]]);
            }


        }

        $ncon = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('eliminer', "null")->get();

       return view('pv/pv_one_three_hafe',['noms'=>$ncon],['aviss'=>$avis]);
        //return view('pv/pvone_three',['concurrents'=>$nom_concurrent],['aviss'=>$avis]);
    }



    function pagefive2_pv1($id,Request $request){
        $nom_concurrents=$request->input("noms");
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;

        $noms=$request->input('nomss');
        $info_table = array();// ce table contient les informations des concurrents
        $info_facu = array();
        for($i=1;$i<=count($noms);$i++){
            $aa=$request->input("res$i");
            $bb=$request->input("objet_res$i");
            if(!empty($aa)){
                DB::update('update concurrents set reserver = ?, objet_reserve = ? where id_offer = ? and id_avis = ? and Nom = ?'
            ,[$aa, $bb, $ids[0], $ids[1], $noms[$i-1]]);
            }
        }

        $ncon = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('eliminer', "null")->get();

       return view('pv/pvone_five',['noms'=>$ncon],['aviss'=>$avis]);
        //return view('pv/pvone_three',['concurrents'=>$nom_concurrent],['aviss'=>$avis]);
    }


    function pagesix_pv1($id,Request $request){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        $noms=$request->input('nomss');
       // $mantant=$request->input('Montant');
        for($i=0;$i<count($noms);$i++){
            $mantant=$request->input("montant$i");
            DB::update('update concurrents set Mantant_dactes = ? where id_offer = ? and id_avis = ? and Nom = ?'
             ,[$mantant, $ids[0], $ids[1],$noms[$i]]);
            }
        DB::table('first_pvs')->insert([
            //'num_avis'=>$request->input('num_avis'),
            'id_avis'=>$ids[1],
            'id_offer'=>$ids[0],
            'num_concurrents'=>count($noms)
        ]);
        return view('pv/pvone_six',['aviss'=>$avis]);
        //return view('pv/pvone_three',['concurrents'=>$nom_concurrent],['aviss'=>$avis]);
    }

    function Imprimerpvone($id){
        //
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $juries=array();
        $juries_facultatif=array();

        $journaux_normal=array();
        $jurnaux_reactife=array();

        $motant=array();
        $motant_facu=array();


        $jm=array();
        $jm_facu=array();

        $js=array();
        $js_facu=array();

        $jmr=array();
        $jmr_facu=array();

        $jsr=array();
        $jsr_facu=array();

        $allconcu=array();
        $allconcu_facu=array();

        $existe=array();
        $existe_facu=array();

        $dos=array();
        $dos_facu=array();

        $port=array();
        $port_facu=array();

        $el=array();
        $el_facu=array();

        $res=array();
        $res_facu=array();


        $nel=array();
        $nel_facu=array();

        $num_offre=$offre->Num;
        $num_avis=$avis->num_avis;
        $date_ouver=$avis->date_ouverture;
        $heure=$avis->heure;
        $objet_offre=$offre->objet;
        $estimation=$offre->estimation;
// Trouver les juries
        $dec = DB::table('decisions')->where('num_decision', $num_avis)->first();
$decjuries = $dec->nom_juries;
        $jureis_id = explode(".", $decjuries);
        for($i=0;$i<count($jureis_id);$i++){
            $jr = DB::table('juries')->where('id', $jureis_id[$i])->first();
$juries_facultatif[0]=$jr->Nom;
$juries_facultatif[1]=$jr->prenom;
$juries_facultatif[2]=$jr->profession;
$juries_facultatif[3]=$jr->qualiter;
array_push($juries, $juries_facultatif);
        }

        $ext='["existe"]';
        $abpdos='["Physique"]';
        $abppor='["Electronique"]';
        $jmm = DB::table('jounal_matins')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('etat', "normal")->get();
        $jss = DB::table('jounal_saharas')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('etat', "normal")->get();
        $all_concurrents = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->get();
        $existe_concurrents = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('existe', $ext)->get();
        $dos_concurrents = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('Postuler', $abpdos)->get();
        $por_concurrents = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('Postuler', $abppor)->get();
        $eliminer_concurrents = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('eliminer', "Eliminer")->get();
        $non_eliminer_concurrents = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('eliminer', "null")->get();

        $jmmn = DB::table('jounal_matins')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('etat', "rectificatif")->get();
        $jssn = DB::table('jounal_saharas')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('etat', "rectificatif")->get();

        $concu_res = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('reserver', "reserve")->get();


      //  $montant_dactes=$non_eliminer_concurrents->Mantant_dactes;
        for($i=0;$i<count($non_eliminer_concurrents);$i++){
            $motant_facu[0]=$i+1;
            $motant_facu[1]=$non_eliminer_concurrents[$i]->Nom;
            $motant_facu[2]=$non_eliminer_concurrents[$i]->Mantant_dactes;
            array_push($motant, $motant_facu);
        }

        for($i=0;$i<count($concu_res);$i++){
            $res_facu[0]=$i+1;
            $res_facu[1]=$concu_res[$i]->Nom;
            $res_facu[2]=$concu_res[$i]->objet_reserve;
            array_push($res, $res_facu);
        }

        for($i=0;$i<count($jmmn);$i++){
            $jmr_facu[0]=$jmmn[$i]->Page_num;
            $jmr_facu[1]=$jmmn[$i]->numero_journal;
            $jmr_facu[2]=$jmmn[$i]->Date;
            array_push($jmr, $jmr_facu);
        }

        for($i=0;$i<count($jssn);$i++){
            $jsr_facu[0]=$jssn[$i]->Page_num;
            $jsr_facu[1]=$jssn[$i]->numero_journal;
            $jsr_facu[2]=$jssn[$i]->Date;
            array_push($jsr, $jsr_facu);
        }



        for($i=0;$i<count($jmm);$i++){
            $jm_facu[0]=$jmm[$i]->Page_num;
            $jm_facu[1]=$jmm[$i]->numero_journal;
            $jm_facu[2]=$jmm[$i]->Date;
            array_push($jm, $jm_facu);
        }

        for($i=0;$i<count($jss);$i++){
            $js_facu[0]=$jss[$i]->Page_num;
            $js_facu[1]=$jss[$i]->numero_journal;
            $js_facu[2]=$jss[$i]->Date;
            array_push($js, $js_facu);
        }

        for($i=0;$i<count($all_concurrents);$i++){
            $allconcu_facu[0]=$i+1;
            $allconcu_facu[1]=$all_concurrents[$i]->Nom;
            array_push($allconcu, $allconcu_facu);
        }

        for($i=0;$i<count($existe_concurrents);$i++){
            $existe_facu[0]=$i+1;
            $existe_facu[1]=$existe_concurrents[$i]->Nom;
            array_push($existe, $existe_facu);
        }
        $countnb=0;
        for($i=0;$i<count($dos_concurrents);$i++){
            $dos_facu[0]=$i+1;
            $dos_facu[1]=$dos_concurrents[$i]->Nom;
            $countnb=$i+1;
            array_push($dos, $dos_facu);
        }

        for($i=0;$i<count($por_concurrents);$i++){
            $port_facu[0]=++$countnb;
            $port_facu[1]=$por_concurrents[$i]->Nom;
            array_push($port, $port_facu);
        }

        for($i=0;$i<count($eliminer_concurrents);$i++){
            $el_facu[0]=$i+1;
            $el_facu[1]=$eliminer_concurrents[$i]->Nom;
            $el_facu[2]=$eliminer_concurrents[$i]->Motif;
            array_push($el, $el_facu);
        }

        for($i=0;$i<count($non_eliminer_concurrents);$i++){
            $nel_facu[0]=$i+1;
            $nel_facu[1]=$non_eliminer_concurrents[$i]->Nom;
            array_push($nel, $nel_facu);
        }


        $templateProcessor = new TemplateProcessor( documentTemplate: 'Word-files/proces_verbal_01.docx');
        $templateProcessor->setValue( 'num_offre', $num_offre);
        $templateProcessor->setValue( 'num_avis', $num_avis);
        $templateProcessor->setValue( 'date_ouverture', $date_ouver);
        $templateProcessor->setValue( 'heure', $heure);
        $templateProcessor->setValue( 'objet', $objet_offre);
        $templateProcessor->setValue( 'estimation', $estimation);

        $templateProcessor->cloneBlock('block_juries', 0, true, false, $juries);
        $templateProcessor->cloneBlock('block_juriess', 0, true, false, $juries);

        $templateProcessor->cloneBlock('blockk_journaux_matin', 0, true, false, $jm);
        $templateProcessor->cloneBlock('blockk_journaux_sahara', 0, true, false, $js);

        $templateProcessor->cloneBlock('blockk_journaux_matin_r', 0, true, false, $jmr);
        $templateProcessor->cloneBlock('blockk_journaux_sahara_r', 0, true, false, $jsr);

        $templateProcessor->cloneBlock('dossier_concurr', 0, true, false, $dos);
        $templateProcessor->cloneBlock('portail_concurr', 0, true, false, $port);
        $templateProcessor->cloneBlock('existant', 0, true, false, $existe);
        $templateProcessor->cloneBlock('all_concurrant', 0, true, false, $allconcu);
        $templateProcessor->cloneBlock('eliminer_concurrant', 0, true, false, $el);
        $templateProcessor->cloneBlock('hh', 0, true, false, $el);
        $templateProcessor->cloneBlock('non_eliminer_concurrant', 0, true, false, $nel);
        $templateProcessor->cloneBlock('non_eliminer_concurrants', 0, true, false, $nel);

        $templateProcessor->cloneBlock('reserve', 0, true, false, $res);


        $templateProcessor->cloneBlock('montant', 0, true, false, $motant);
        $templateProcessor->saveAs( fileName: 'proces_verbal_01.docx');
      return response()->download(file : 'proces_verbal_01.docx')->deleteFileAfterSend(shouldDelete:true);

    }


    function pageone_pv2($id,Request $request){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        $non_eliminer_concurrents = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('eliminer', "null")->get();


        return view('pv/pvtwo_one',['concurrents'=>$non_eliminer_concurrents],['aviss'=>$avis]);
    }

    function pagetwo_pv2($id,Request $request){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        $avis->estimation=$offre->estimation;
        $table=array();
        $table_facu=array();
        $non_eliminer_concurrents = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('eliminer', "null")->get();
        for($i=0;$i<count($non_eliminer_concurrents);$i++){
        $request->validate([
            "montant_apres$i"=>'required'
        ],
        [
         'required'=> 'Champs obligatoire',
        ]);}
for($i=0;$i<count($non_eliminer_concurrents);$i++){
    $table_facu[0]=$request->input("noms$i");
    $table_facu[1]=trim($request->input("montant_apres$i"));

    $aa=trim($request->input("montant_apres$i"));
    $a=intval($aa)-intval($offre->estimation);
    $b=$a*100;
    $c=$b/intval($offre->estimation);
$cc=number_format((float)$c, 2, '.', '');
    $table_facu[3]=$cc;
    array_push($table, $table_facu);
}
        return view('pv/pvtwo_two',['concurrents'=>$table],['aviss'=>$avis]);
    }

    function pagethree_pv2($id,Request $request){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        $table=array();
        $table_facu=array();
        $non_eliminer_concurrents = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('eliminer', "null")->get();
        for($i=0;$i<count($non_eliminer_concurrents);$i++){
            $table_facu[0]=$request->input("noms$i");
            $table_facu[1]=$request->input("apre_verifi$i");
            $table_facu[2]=$request->input("obser$i")[0];
            $table_facu[3]=$request->input("taux$i");
            array_push($table, $table_facu);
        }
        $id_pv_one = DB::table('first_pvs')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->first();
        for($i=0;$i<count($non_eliminer_concurrents);$i++){
            $id_pv_deux = DB::table('pv_deuxes')->where('num_offer', $ids[0])->where('id_pv_one', $id_pv_one->id)->where('id_avis', $ids[1])->where('id_concurrent', $non_eliminer_concurrents[$i]->id)->first();
            if(empty($id_pv_deux)){
        DB::table('pv_deuxes')->insert([
            //'num_avis'=>$request->input('num_avis'),
            'num_offer'=>$ids[0],
            'id_pv_one'=>$id_pv_one->id,
            'id_avis'=>$ids[1],
            'id_concurrent'=>$non_eliminer_concurrents[$i]->id,
            'Mantant_dactes_apres_verification'=>$table[$i][1],
            'Taux'=>$table[$i][3],
            'observe'=>$table[$i][2]
        ]);
    }
    else{
        DB::update('update pv_deuxes set Mantant_dactes_apres_verification = ?, Taux = ?, observe = ?  where num_offer = ? and id_pv_one = ? and id_avis = ? and id_concurrent = ?'
        ,[$table[$i][1], $table[$i][3], $table[$i][2],$ids[0],$id_pv_one->id,$ids[1],$non_eliminer_concurrents[$i]->id]);
    }
    }

    return redirect('/process_verbal');
    }

    function Imprimerpvtwo($id,Request $request){

        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $juries=array();
        $juries_facultatif=array();
        $nel=array();
        $nel_facu=array();

        $nelimin=array();
        $neliminer_facu=array();

        $allconcu=array();
        $allconcu_facu=array();

        $allconcuex=array();
        $allconcuex_facu=array();

        $minconcu=array();
        $minconcu_facu=array();

        $ecater=array();
        $ecater_facu=array();

        $non_ecater=array();
        $non_ecater_facu=array();

        $final_concu=array();

        $num_offre=$offre->Num;
        $num_avis=$avis->num_avis;
        $date_ouver=$avis->date_ouverture;
        $heure=$avis->heure;
        $objet_offre=$offre->objet;
        $estimation=$offre->estimation;
        $dec = DB::table('decisions')->where('num_decision', $num_avis)->first();
        $decjuries = $dec->nom_juries;
                $jureis_id = explode(".", $decjuries);
                for($i=0;$i<count($jureis_id);$i++){
                    $jr = DB::table('juries')->where('id', $jureis_id[$i])->first();
        $juries_facultatif[0]=$jr->Nom;
        $juries_facultatif[1]=$jr->prenom;
        $juries_facultatif[2]=$jr->profession;
        $juries_facultatif[3]=$jr->qualiter;
        array_push($juries, $juries_facultatif);
                }


                $non_eliminer_concurrents = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('eliminer', "null")->get();
                $non_eliminer = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('eliminer', "null")->get();
                $bbb=DB::table('pv_deuxes')->where('num_offer', $ids[0])->where('id_avis', $ids[1])->where('observe', "Excessive")->get();
                $minn=DB::table('pv_deuxes')->where('num_offer', $ids[0])->where('id_avis', $ids[1])->where('observe',"!=","Excessive")->get();
                $minmum=$minn->min('Mantant_dactes_apres_verification');

                $ecarter = DB::table('pv_deuxes')->where('num_offer', $ids[0])->where('id_avis', $ids[1])->where('observe', "Excessive")->get();

                $necarter = DB::table('pv_deuxes')->where('num_offer', $ids[0])->where('id_avis', $ids[1])->where('observe',"!=","Excessive")->get();


             //  $find=DB::table('pv_deuxes')->where('observe',"!=","Excessive")->where('Mantant_dactes_apres_verification', "$minn")->first();
               $find_concu=DB::table('pv_deuxes')->where('num_offer', $ids[0])->where('id_avis', $ids[1])->where("Mantant_dactes_apres_verification","$minmum")->first();
               $find=DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where("id",$find_concu->id_concurrent)->first();


               for($i=0;$i<count($ecarter);$i++){
                $idddd=DB::table('concurrents')->where('id', $ecarter[$i]->id_concurrent)->first();
                $ecater_facu[0]=$i+1;
                $ecater_facu[1]=$idddd->Nom;
                $ecater_facu[2]="Excessive";
                array_push($ecater, $ecater_facu);
            }

            for($i=0;$i<count($necarter);$i++){
                $ft=DB::table('concurrents')->where('id', $necarter[$i]->id_concurrent)->first();
                $non_ecater_facu[0]=$i+1;
                $non_ecater_facu[1]=$ft->Nom;
                $non_ecater_facu[2]=$necarter[$i]->Mantant_dactes_apres_verification;
                array_push($non_ecater, $non_ecater_facu);
            }


                for($i=0;$i<count($non_eliminer_concurrents);$i++){
                    $nel_facu[0]=$i+1;
                    $nel_facu[1]=$non_eliminer_concurrents[$i]->Nom;
                    array_push($nel, $nel_facu);
                }
                for($i=0;$i<count($non_eliminer);$i++){
                    $a=DB::table('pv_deuxes')->where('num_offer', $ids[0])->where('id_avis', $ids[1])->where('id_concurrent', $non_eliminer[$i]->id)->first();
                    $neliminer_facu[0]=$i+1;
                    $neliminer_facu[1]=$non_eliminer[$i]->Nom;
                    $neliminer_facu[2]=$non_eliminer[$i]->Mantant_dactes;
                    $neliminer_facu[3]= $a->Mantant_dactes_apres_verification;
                    array_push($nelimin, $neliminer_facu);
                }

                for($i=0;$i<count($non_eliminer);$i++){
                    $aaa=DB::table('pv_deuxes')->where('num_offer', $ids[0])->where('id_avis', $ids[1])->where('id_concurrent', $non_eliminer[$i]->id)->first();
                    $allconcu_facu[0]=$i+1;
                    $allconcu_facu[1]=$non_eliminer[$i]->Nom;
                    $allconcu_facu[2]= $aaa->Mantant_dactes_apres_verification;
                    $allconcu_facu[3]= $aaa->Taux;
                    $allconcu_facu[4]= $aaa->observe;
                    array_push($allconcu, $allconcu_facu);
                }


                for($i=0;$i<count($bbb);$i++){
                    $vvv=DB::table('concurrents')->where('id', $bbb[$i]->id_concurrent)->first();
                    $allconcuex_facu[0]=$i+1;
                    $allconcuex_facu[1]=$vvv->Nom;
                    array_push($allconcuex, $allconcuex_facu);
                }



                $minconcu_facu[0]=$find->Nom;
                $minconcu_facu[1]=$minmum;
                array_push($minconcu, $minconcu_facu);

                   $templateProcessor = new TemplateProcessor( documentTemplate: 'Word-files/proces_verbal_2.docx');
        $templateProcessor->setValue( 'num_offre', $num_offre);
        $templateProcessor->setValue( 'num_avis', $num_avis);
        $templateProcessor->setValue( 'date_ouverture', $date_ouver);
        $templateProcessor->setValue( 'heure', $heure);
        $templateProcessor->setValue( 'objet', $objet_offre);
        $templateProcessor->setValue( 'estimation', $estimation);

        $templateProcessor->cloneBlock('block_juries', 0, true, false, $juries);
        $templateProcessor->cloneBlock('block_juriess', 0, true, false, $juries);
               $templateProcessor->cloneBlock('non_eliminer_concurrant', 0, true, false, $nel);
               $templateProcessor->cloneBlock('non_eliminer_concurrant_montant', 0, true, false, $nelimin);
               $templateProcessor->cloneBlock('non_eliminer_concurrant_montants', 0, true, false, $nelimin);
               $templateProcessor->cloneBlock('non_eliminer_concurrant_taux', 0, true, false, $allconcu);
               $templateProcessor->cloneBlock('concu_ecar', 0, true, false, $allconcuex);
               $templateProcessor->cloneBlock('min_concurrent', 0, true, false, $minconcu);
                $templateProcessor->cloneBlock('concu_non_ecar', 0, true, false, $final_concu);

                $templateProcessor->cloneBlock('non_excessive', 0, true, false, $non_ecater);
                $templateProcessor->cloneBlock('excessive', 0, true, false, $ecater);


                $templateProcessor->saveAs( fileName: 'proces_verbal_2.docx');
                return response()->download(file : 'proces_verbal_2.docx')->deleteFileAfterSend(shouldDelete:true);
    }
    function pageone_pv3($id,Request $request){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        $concurent = DB::table('concurrents')->where('id_offer', $ids[0])->where('id_avis', $ids[1])->where('eliminer', "null")->get();
       // return $concurent;
        return view('pv/pvthree_one',['concurrents'=>$concurent],['aviss'=>$avis]);
    }

    function pagetwo_pv3($id,Request $request){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;

        $nom_concurrent=$request->input("idconcu");
        $concurent = DB::table('concurrents')->where('id', $nom_concurrent)->first();
     return view('pv/pvthree_two',['concurrents'=>$concurent],['aviss'=>$avis]);
    }

    function endofpv3($id,Request $request){

        $request->validate([
            'nom_gerant'=>'required',
            'qualiter'=>'required',
            'cnss'=>'required',
            'capital'=>'required',
            'adresse'=>'required',
            'registre'=>'required',
            'ribe'=> 'required',
            'bq'=> 'required'
        ],
        [
         'required'=> 'Champs obligatoire',
        ]);


        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        $pv_deux = DB::table('pv_deuxes')->where('num_offer', $ids[0])->where('id_avis', $ids[1])->where('id_concurrent', $request->input("id_concu"))->first();

        DB::table('pv_trois')->insert([
            //'num_avis'=>$request->input('num_avis'),
            'num_offer'=>$ids[0],
            'id_avis'=>$ids[1],
            'id_gagnant'=>$request->input("id_concu"),
            'id_pv_deux'=>$pv_deux->id,
            'Nom_gerant'=>$request->input("nom_gerant"),
            'qualiter'=>$request->input("qualiter"),
            'Num_cnss'=>$request->input("cnss"),
            'capital_social'=>$request->input("capital"),
            'adresse'=>$request->input("adresse"),
            'registre'=>$request->input("registre"),
            'RIB'=>$request->input("ribe"),
            'banque'=>$request->input("bq")
        ]);
        return redirect('/process_verbal');
    }

    function Imprimerpvthree($id){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $juries=array();
        $juries_facultatif=array();

        $num_offre=$offre->Num;
        $num_avis=$avis->num_avis;
        $date_ouver=$avis->date_ouverture;
        $heure=$avis->heure;
        $objet_offre=$offre->objet;
        $estimation=$offre->estimation;
        $dec = DB::table('decisions')->where('num_decision', $num_avis)->first();
        $decjuries = $dec->nom_juries;
                $jureis_id = explode(".", $decjuries);
                for($i=0;$i<count($jureis_id);$i++){
                    $jr = DB::table('juries')->where('id', $jureis_id[$i])->first();
        $juries_facultatif[0]=$jr->Nom;
        $juries_facultatif[1]=$jr->prenom;
        $juries_facultatif[2]=$jr->profession;
        $juries_facultatif[3]=$jr->qualiter;
        array_push($juries, $juries_facultatif);
                }

                $idgagant = DB::table('pv_trois')->where('num_offer', $ids[0])->where('id_avis', $ids[1])->first();
                $gagant = DB::table('concurrents')->where('id', $idgagant->id_gagnant)->first();
                $nom_gagant=$gagant->Nom;
                $name_gerant=$idgagant->Nom_gerant;
                $adresse=$idgagant->adresse;
                $cnss=$idgagant->Num_cnss;
                $rib=$idgagant->RIB;
                $banque=$idgagant->banque;
                $registre=$idgagant->registre;
                $mm = DB::table('pv_deuxes')->where('id_concurrent', $idgagant->id_gagnant)->first();
                $montant=$mm->Mantant_dactes_apres_verification;

                $templateProcessor = new TemplateProcessor( documentTemplate: 'Word-files/proces_verbal_3.docx');
                $templateProcessor->setValue( 'num_offre', $num_offre);
                $templateProcessor->setValue( 'num_avis', $num_avis);
                $templateProcessor->setValue( 'date_ouverture', $date_ouver);
                $templateProcessor->setValue( 'heure', $heure);
                $templateProcessor->setValue( 'objet', $objet_offre);
                $templateProcessor->setValue( 'estimation', $estimation);
                $templateProcessor->setValue( 'nom_gagnant', $nom_gagant);
                $templateProcessor->setValue( 'montant', $montant);

                $templateProcessor->setValue( 'gerant', $name_gerant);
                $templateProcessor->setValue( 'adresse', $adresse);
                $templateProcessor->setValue( 'cnss', $cnss);
                $templateProcessor->setValue( 'rib', $rib);
                $templateProcessor->setValue( 'banque', $banque);
                $templateProcessor->setValue( 'registre', $registre);

                $templateProcessor->cloneBlock('block_juries', 0, true, false, $juries);
                $templateProcessor->cloneBlock('block_juriess', 0, true, false, $juries);

                $templateProcessor->saveAs( fileName: 'proces_verbal_3.docx');
                return response()->download(file : 'proces_verbal_3.docx')->deleteFileAfterSend(shouldDelete:true);

    }

    function supprimer_pvone($id){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        DB::delete('delete from first_pvs where id_offer =  ?',[$ids[0]]);
//        DB::delete('delete from concurrents where id_offer =  ?',[$ids[0]]);
        DB::delete('delete from jounal_matins where id_offer =  ?',[$ids[0]]);
        DB::delete('delete from jounal_saharas where id_offer =  ?',[$ids[0]]);
        DB::delete('delete from pv_deuxes where num_offer =  ?',[$ids[0]]);
        DB::delete('delete from pv_trois where num_offer =  ?',[$ids[0]]);
        return redirect('/process_verbal');
       //return $avis;
    }


    function supprimer_pvtwo($id){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        DB::delete('delete from pv_deuxes where num_offer =  ?',[$ids[0]]);

        return redirect('/process_verbal');
       //return $avis;
    }

    function supprimer_pvthree($id){
        $ids=explode("_", $id);
        $offre = offer::find($ids[0]);
        $avis = DB::table('avis')->where('id', $ids[1])->first();
        $aa=$offre->id.'_'.$avis->id;
        $avis->idss=$aa;
        DB::delete('delete from pv_trois where num_offer =  ?',[$ids[0]]);
        return redirect('/process_verbal');
       //return $avis;
    }

    function getConcurrentsByHints($hint){
       $concurrents=DB::table('concurrents')->where('Nom','like','%'.$hint.'%')->get();
       return json_encode($concurrents);
    }

}
