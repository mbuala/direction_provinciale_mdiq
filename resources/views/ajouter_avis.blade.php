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
                    Insérer une avis d'appels d'offre</h2>
            </div>
        </div>
        @if(Session::get('faildate'))
        <div class='alert alert-danger'>
    {{Session::get('faildate')}}
        </div>
            @endif
        <div class="cardo">
            <form class="formul" action="ajouterr_aviss" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="row">

                            <label for="fname" class="control-label" id="lab-nom">Entrer numero d'avis</label>
                            <input type="text" class="form-control" id="inp-nom" placeholder="N d'avis" name="num_avis" value="{{ old('num_avis')}}">
                            <label style='color:red;'> @error('num_avis'){{ $message}}@enderror</label>
                        </div>
                        <div class="row">

                            <label for="fname" class="control-label">Entrer la date d'avis</label>
                            <div class="col"  style="max-width: 30% ;margin-left:0%" >
                                <input type="number" class="form-control" placeholder="Jours" name="jours_avis" value="{{ old('jours_avis')}}" min="1" max="31">
                                <label style='color:red;'> @error('jours_avis'){{ $message}}@enderror</label>
                            </div>
                            <div class="col"  style="max-width: 1%; font-size: 200%" >
                                <label class="control-label">/</label>
                            </div>
                            <div class="col"   style="max-width: 30% ;margin-left:0%">
                                <input type="number" class="form-control" placeholder="Mois" name="mois_avis" value="{{ old('mois_avis')}}"  min="1" max="12">
                                <label style='color:red;'> @error('mois_avis'){{ $message}}@enderror</label>
                            </div>
                            <div class="col"  style="max-width: 1%; font-size: 200%" >
                                <label class="control-label">/</label>
                            </div>
                            <div class="col"   style="max-width: 30% ;margin-left:0%">
                                <input type="number" class="form-control" placeholder="Année" name="annee_avis" value="{{ old('annee_avis')}}" min="2021">
                                <label style='color:red;'> @error('annee_avis'){{ $message}}@enderror</label>
                            </div>

                        </div>
                        <div class="row">

                            <label for="startDate">Entrer la Date d'Ouverture</label>


                            <div class="col"  style="max-width: 30% ;margin-left:0%" >
                                <input type="number" class="form-control" placeholder="Jours" name="jours_ouver" id="jours_avis_ouve" value="{{ old('jours_ouver')}}" min="1" max="31">
                                <label style='color:red;'> @error('jours_ouver'){{ $message}}@enderror</label>
                            </div>
                            <div class="col"  style="max-width: 1%; font-size: 200%" >
                                <label class="control-label">/</label>
                            </div>
                            <div class="col"   style="max-width: 30% ;margin-left:0%">
                                <input type="number" class="form-control" placeholder="Mois" name="mois_ouver" value="{{ old('mois_ouver')}}" min="1" max="12">
                                <label style='color:red;'> @error('mois_ouver'){{ $message}}@enderror</label>
                            </div>
                            <div class="col"  style="max-width: 1%; font-size: 200%" >
                                <label class="control-label">/</label>
                            </div>
                            <div class="col"   style="max-width: 30% ;margin-left:0%">
                                <input type="number" class="form-control" placeholder="Année" name="annee_ouver" value="{{ old('annee_ouver')}}" min="2021">
                                <label style='color:red;'> @error('annee_ouver'){{ $message}}@enderror</label>
                            </div>
                                                </div>
                        <div class="row" >
                            <label for="fname" class="control-label">Entrer le temps de l'avis</label>
                            <div class="col"  style="max-width: 30% ;margin-left:0%" >
                                <input type="number" class="form-control" placeholder="heure" name="heure_ouver" value="{{ old('heure_ouver')}}" min="00" max="23">
                                <label style='color:red;'> @error('heure_ouver'){{ $message}}@enderror</label>
                            </div>
                            <div class="col"  style="max-width: 1% ">
                                <label class="control-label">:</label>                            </div>
                            <div class="col"   style="max-width: 30% ;margin-left:0%">
                                <input type="number" class="form-control" placeholder="minutes" name="min_ouver" value="{{ old('min_ouver')}}" min="00" max="59">
                                <label style='color:red;'> @error('min_ouver'){{ $message}}@enderror</label>
                            </div>
                            <div class="col"  style="max-width: 8.5% " >
                                <label class="control-label">pm</label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label style="margin-bottom: 3%;">Choisir les offres de cette avis</label>
                        <label style='color:red;'> @error('offer'){{ $message}}@enderror</label>
                        <div class="cadrone" >
                            <label>Entrer numero d'offre</label>
                            <input type="text" class="form-control" placeholder="Numero" id="inputrech" onkeyup="filtrer()">

                            <div class="tablo tablotwo" >
                                <div class="row">
                                    <div class="col"> <input class="form-check-input" type="checkbox" value="" id="tous" onchange="cocher()">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Tous
                                        </label>
                                    </div>
                                    <div class="col">le numero d'offre</div>
                                </div>

                                <b id="tst">
                                @foreach ($data_offer as $offer)

                                <div class="row">
                                    <div class="col"><input class="form-check-input" type="checkbox" name="offer[]" value="{{$offer['id']}}">
                                        <label class="form-check-label" for="flexCheckDefault">
                                    </div>
                                    <div class="col"><span class="sp" id="sp">{{$offer['Num']}}</span></div>
                                </div>
                                @endforeach
                            </b>
                            </div>
                        </div>
                    </div>
                </div>



                <input type="submit" class="btn btn-primary" id="ajouter-avis" style="width: 18%;margin-left:78% ;border-radius: 12px" value="Ajouter">

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
