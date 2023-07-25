@extends('master.layout')
@section('title')
ajouter un avis
@endsection
@section('avis')active @endsection
@section('content')

<div class="content" style="margin-left:20% ;TOP:0;">

    <div class="container">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <h2 style="text-decoration-line: underline;text-decoration-color: #0d6efd; ">
                    Modifieir une avis d'appels d'offre</h2>
            </div>
        </div>
        <div class="cardo">
            <form class="formul" action="update/{{ $avis_info->id }}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col">
                        <label style="margin-bottom: 3%; margin-top: 0%;">choisir les offres de cette
                            avis</label>
                        <div class="row">

                            <label for="fname" class="control-label" id="lab-nom">Entrer numero d'avis</label>
                            <input type="text" class="form-control" id="inp-nom" placeholder="N d'avis" name="num_avis" value="{{ $avis_info->num_avis }}">

                        </div>
                        <div class="row">

                            <label for="fname" class="control-label">Entrer la date d'avis</label>
                            <div class="col"  style="max-width: 30% ;margin-left:0%" >
                                <input type="text" class="form-control" placeholder="Jours" name="jours_avis" value="{{ $avis_info->jours }}">
                            </div>
                            <div class="col"  style="max-width: 1%; font-size: 200%" >
                                <label class="control-label">/</label>
                            </div>
                            <div class="col"   style="max-width: 30% ;margin-left:0%">
                                <input type="text" class="form-control" placeholder="Mois" name="mois_avis" value="{{ $avis_info->mois }}">
                            </div>
                            <div class="col"  style="max-width: 1%; font-size: 200%" >
                                <label class="control-label">/</label>
                            </div>
                            <div class="col"   style="max-width: 30% ;margin-left:0%">
                                <input type="text" class="form-control" placeholder="Année" name="annee_avis" value="{{ $avis_info->anne }}">
                            </div>

                        </div>
                        <div class="row">

                            <label for="startDate">Entrer la Date d'Ouverture</label>


                            <div class="col"  style="max-width: 30% ;margin-left:0%" >
                                <input type="text" class="form-control" placeholder="Jours" name="jours_ouver" value="{{ $avis_info->jours_ouver }}">
                            </div>
                            <div class="col"  style="max-width: 1%; font-size: 200%" >
                                <label class="control-label">/</label>
                            </div>
                            <div class="col"   style="max-width: 30% ;margin-left:0%">
                                <input type="text" class="form-control" placeholder="Mois" name="mois_ouver" value="{{ $avis_info->mois_ouver }}">
                            </div>
                            <div class="col"  style="max-width: 1%; font-size: 200%" >
                                <label class="control-label">/</label>
                            </div>
                            <div class="col"   style="max-width: 30% ;margin-left:0%">
                                <input type="text" class="form-control" placeholder="Année" name="annee_ouver"  value="{{ $avis_info->anne_ouver }}">
                            </div>
                                                </div>
                        <div class="row" >
                            <label for="fname" class="control-label">Entrer le temps de l'avis</label>
                            <div class="col"  style="max-width: 30% ;margin-left:0%" >
                                <input type="text" class="form-control" placeholder="heure" name="heure_ouver" value="{{ $avis_info->heure }}">
                            </div>
                            <div class="col"  style="max-width: 1% ">
                                <label class="control-label">:</label>                            </div>
                            <div class="col"   style="max-width: 30% ;margin-left:0%">
                                <input type="text" class="form-control" placeholder="minutes" name="min_ouver" value="{{ $avis_info->minute }}">
                            </div>
                            <div class="col"  style="max-width: 8.5% " >
                                <label class="control-label">pm</label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label style="margin-bottom: 3%;">choisir les offres</label>
                        <div class="cadrone" >
                            <label>entrer numero d'offre</label>
                            <input type="text" class="form-control" placeholder="numero" id="inputrech" onkeyup="filtrer()">

                            <div class="tablo tablotwo" >

                                <div class="row">
                                    <div class="col"> <input class="form-check-input" type="checkbox" type="checkbox" value="" id="tous" onchange="cocher()">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Tous
                                        </label>
                                    </div>
                                    <div class="col">le numero d'offre</div>
                                </div>
                                <b id="tst">
                                @foreach ($offre_table as $offre)

                                @if ($offre[1]=="kayn")
                                <div class="row">
                                    <div class="col"> <input class="form-check-input" type="checkbox"  name="offer[]" value="{{$offre[2]}}" checked>
                                    </div>
                                    <div class="col"><span class="sp" id="sp">{{$offre[0]}}</span></div>
                                </div>
                                @elseif ($offre[1]=="m_kayn")
                                <div class="row">
                                    <div class="col"> <input class="form-check-input" type="checkbox"  name="offer[]" value="{{$offre[2]}}">
                                    </div>
                                    <div class="col"><span class="sp" id="sp">{{$offre[0]}}</span></div>
                                </div>
                                @endif

                                @endforeach
                                </b>



                            </div>
                        </div>
                    </div>
                </div>



                <input type="submit" class="btn btn-primary" id="ajouter-avis" style="width: 18%;margin-left:78% ;border-radius: 12px" value="Modifier">
           <!-- hadi href dyalha howa dik page lighadir fiha traitement
            dyal ajouter dakchi lach action dyal form
            khalito khawi
        o mn ba3d fach dir traitement redirictiha l page dyal liste avis -->

            </form>
        </div>

    </div>


</div>
<script>

function filtrer(){
        var aa,txt
    var rech=document.getElementById("inputrech").value;
    var divv=document.getElementById("num");
    var divall=document.getElementById("tabl");
    var divvmed=document.getElementById("colo");
    var scrol=document.getElementById("scrol");
    var sp=document.getElementsByTagName("span");
    var spid=document.getElementById("tst");



    var bb = document.getElementById("hh");
    //bb.value = spid.getElementsByClassName('row').length;/*
    if(rech != "")
    {
        for(i=0;i<sp.length;i++){
spid.getElementsByClassName('row')[i].style.display="";

}
        for(i=0;i<sp.length;i++){
        aa=sp[i].innerHTML
        if(aa){

     if(sp[i].innerHTML.indexOf(rech)<=-1){
            spid.getElementsByClassName('row')[i].style.display="none";
        }

    }


    }


    }
    else{
    for(i=0;i<sp.length;i++){
        aa=sp[i].innerHTML
        if(aa){
            spid.getElementsByClassName('row')[i].style.display="";
    }

    }


    }




    }


function cocher(){

    var ele=document.getElementsByName('offer[]');
    if(document.getElementById("tous").checked){
    for(var i=0; i<ele.length; i++){
    if(ele[i].type=='checkbox')
    ele[i].checked=true;
    }
    }

    if(!document.getElementById("tous").checked){
    for(var i=0; i<ele.length; i++){
    if(ele[i].type=='checkbox')
    ele[i].checked=false;
    }
    }
    }
        </script>
@endsection
