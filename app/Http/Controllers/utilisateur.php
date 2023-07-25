<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class utilisateur extends Controller
{
 function show(){
        $data_Users = User::all();
        return view('utilisateurs',['utilisateurs'=>$data_Users]);
    }


       public function insertform(){
        return view('ajouter_user');
        }

            function insert(Request $request){
        //return view('ajouter_juri');
        $request->validate([
            'nom'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required'

        ],
        [
         'required'=> 'Champs obligatoire' // custom message
        ]);

        $query = DB::table('users')->insert([
            'name'=>$request->input('nom'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'role'=>$request->input('role')
        ]);
if($query){
   return redirect('/utilisateurs')->with('success','Utilisateur à bien ajouter');
}else{
    return redirect('/utilisateurs')->with('fail','Il y a un probleme,  veuillez ressayer');
}

    }



    public function destroy($id){

  $res=User::find($id)->delete();
  if ($res){
   return redirect('/utilisateurs')->with('success','utilisateur a bien suprimer');

  }else{
   return redirect('/utilisateurs')->with('fail','Il y a un probleme,  veuillez ressayer');

     }




}
    function showSpecialUser($id){
    	$res = User::find($id);
    	return view("modifier_user",['utilisateur'=>$res]);
    }
    function EditSpecialUser(Request $request,$id){
    	       $request->validate([
            'nom'=>'required',
            'email'=>'required',
                   'role'=>'required',


        ],
        [
         'required'=> 'Champs obligatoire' // custom message
        ]);

        $name=$request->input('nom');
            $email=$request->input('email');
              $password=$request->input('password');

              if ( $password="") {
          $res=DB::table('users')->where('id', $id)->update(array('name' => $name,'email' => $email,'role'=>$request->input('role')));


              }else{
              $password=Hash::make($request->input('password'));

          $res= DB::table('users')->where('id', $id)->update(array('name' => $name,'email' => $email,'password' => $password,'role'=>$request->input('role')));

              }
              if ( $res) {
   return redirect('/utilisateurs')->with('success','utilisateur a bien modifier');
              	# code...
              }else{
   return redirect('/utilisateurs')->with('fail','Il y a un probleme,  veuillez ressayer');
              }


    }
}
