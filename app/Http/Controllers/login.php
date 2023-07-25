<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jury;
use App\Models\Offer;
use App\Models\decision;
use App\Models\avis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class login extends Controller
{
    function show(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],
        [
         'required'=> 'Champs obligatoire' // custom message
        ]);
        $pre=DB::table('login')->get();
        $pp=DB::table('login')->where('email', $request->input('email'))->first();
        if(empty($pp)){
            return redirect('/')->with('fail','Ce Email '.$request->input('email').' n\'existe pas dans la base donnée du département');
        }
        else{
            if($pp->password==$request->input('password')){
               // $this->middleware("guest");
               $this->middleware("admin");
                return redirect('liste_offre');
    }
        else{
            return redirect('/')->with('faild','Pardon ! Mais votre mot de passe incorrecte . Veuillez Réssayer');
        }
        }
    }


    function md_lg(Request $request){
        $request->validate([
            'email'=>'required',
            'nom'=>'required',
            'prenom'=>'required',
            'cin'=>'required'
        ],
        [
         'required'=> 'Champs obligatoire' // custom message
        ]);
        $pp=DB::table('login')->where('email', $request->input('email'))->first();
        if(empty($pp)){
            return redirect('/modifier_login')->with('fail','Ce Email '.$request->input('email').' n\'existe pas dans la base donnée du département');
        }
        else{
            if($pp->Nom==$request->input('nom') && $pp->prenom==$request->input('prenom') && $pp->cn==$request->input('cin')){
                return view('UpdatePass',['personale_info'=>$pp]);
        }else{
            return redirect('/modifier_login')->with('nn','les informations sont Incorrecte');
        }

        }

    }
    function mdd(Request $request){
        $request->validate([
            'pass'=>'required',
            'cpass'=>'required'
        ],
        [
         'required'=> 'Champs obligatoire' // custom message
        ]);

        if($request->input('pass')===$request->input('cpass')){
            $newPass=Hash::make($request->input('pass'));
            DB::update('update login set password = ? where email = ?'
         ,[$request->input('pass'), $request->input('email')]);
            DB::update('update users set password = ? where email = ?',[$newPass,$request->input('email')]);
         return redirect('/');
        }

       return "non";

    }

}
