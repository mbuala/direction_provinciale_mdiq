<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\offer;
use Illuminate\Support\Facades\DB;
class offers extends Controller
{
//
    function show(){
        $data_offer = offers::all();



        return view('liste_offre',['data_offer'=>$data_offer]);
    }



}
