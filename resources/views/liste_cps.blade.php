@extends('master.layout')
@section('title')
liste des CPS
@endsection
@section('cps')active @endsection
@section('content')
<div class="content" style="margin-left:20% ;">
    <div class="sidetwo" style=" background-color: whitesmoke;height: 100%;">
        <div class="rech" style="margin-bottom:3%;margin-top: 2%;">
            <nav class="navbar navbar-light light">
                <div class="container-fluid">
                    <form class="d-flex" style="margin-left:4%;">
                        <img src="search.jpg" class="search-bar" />
                        <input class="form-control me-2" type="text" placeholder="chercher une offre"
                            aria-label="Search" style="  ;width:100% ;" id="inputrech" onkeyup="filtrer()">
                    </form>

                </div>
            </nav>
        </div>

            <div class="row g-3 align-items-center" style="margin-bottom: %;margin-left:2.5%;margin-top: 1%;">
                <div class="col-auto">
                    <h2 style="text-decoration-line: underline;;text-decoration-color: #0d6efd; text-align: left; ">
                        Cahier des Prescription Spéciales</h2>
                </div>
                <div class="col-auto" style="margin-top: 29px;">
                    <p class="fst-italic">{{count($offer)}} Total</p>
                </div>
            </div>


        <div id="tabl" class="offre">
            <div class="row head" id="colo">
                <div class="col" style="max-width: 20%">N° Offre</div>
                <div class="col" style="max-width: 50%">OBJET</div>
                <div class="col" style="max-width: 50%">Pour l'avis</div>
                <div class="col" style="max-width: 30%">IMPRIMER CPS</div>
            </div>

            <div class="scrol" id="scrol">
                <b id="tst">
                @foreach ($offer as $offre)

                <div class="row" id="colo" >

                    <div class="col" style="max-width: 20%" id="num"><span class="sp" id="sp">{{$offre['num']}}</span></div>
                    <div class="col" style="max-width: 50%">{{$offre['objet']}}</div>
                    <div class="col" style="max-width: 50%">{{$offre['avis']}}</div>
                    <div class="col" style="max-width: 30%">
                        <a href="{{url('imprimer_cps/'.$offre['id'] )}}"><button type="button" class="btn btn-outline-success">Imprimer</button></a>
                    </div>

                </div>

                @endforeach
            </b>
            </div>

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
        if(sp[i].innerHTML.indexOf(rech)>-1){
        spid.getElementsByClassName('row')[i].style.display="";
    }
}

}


}




}
</script>
@endsection
