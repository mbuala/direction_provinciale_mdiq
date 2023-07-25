@extends('master.layout')
@section('title')
liste des convocations
@endsection
@section('convocation')active @endsection
@section('content')
<div class="content" style="margin-left:20% ;">
    <div class="sidetwo" style=" background-color: whitesmoke;height: 100%;">
        <div class="rech" style="margin-bottom:3%;margin-top: 2%;">
            <nav class="navbar navbar-light light">
                <div class="container-fluid">
                    <form class="d-flex" style="margin-left:4%;">
                        <img src="search.jpg" class="search-bar" />
                        <input class="form-control me-2" type="search" placeholder="chercher une avis"
                            aria-label="Search" style="  ;width:100% ;" id="inputrech" onkeyup="filtrer()">
                    </form>

                </div>
            </nav>
        </div>

            <div class="row g-3 align-items-center" style="margin-bottom: %;margin-left:2.5%;margin-top: 1%;">
                <div class="col-auto">
                    <h2 style="text-decoration-line: underline;;text-decoration-color: #0d6efd; text-align: left; ">
                        Les convocations</h2>
                </div>
                <div class="col-auto" style="margin-top: 29px;">
                    <p class="fst-italic">{{count($aviii)}} Total</p>
                </div>
            </div>

        <div id="tabl" class="convocation">
            <div class="row head" id="colo">
                <div class="col">N AVIS</div>
                <div class="col">DATE OUVERTURE</div>

                <div class="col">IMPRIMER CONVOCATION</div>
            </div>
            <div class="scrol">
                <b id="tst">
                @foreach ($aviii as $avii)
                <div class="row" id="colo">
                    <div class="col"><span class="sp" id="sp">{{$avii['num']}}</span></div>
                    <div class="col"><strong>{{$avii['date_ouverture']}}</strong>&ensp; À PARTIR DU &ensp;<strong>{{$avii['heure']}}</strong>&ensp;</div>

                    <div class="col">
                        <a href="{{url('imprimer_convocation/'.$avii['id'] )}}"> <button type="button" class="btn btn-outline-success">Imprimer</button></a>
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
            spid.getElementsByClassName('row')[i].style.display="";
    }

    }


    }




    }
    </script>
@endsection
