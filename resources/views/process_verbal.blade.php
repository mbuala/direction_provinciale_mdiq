@extends('master.layout')
@section('title')
Liste des PV
@endsection
@section('pv')active @endsection
@section('content')
<div class="content" style="margin-left:20% ;">
    <div class="sidetwo" style=" background-color: whitesmoke;height: 100%;">
        <div class="rech" style="margin-bottom:3%;margin-top: 2%;">
            <nav class="navbar navbar-light light">
                <div class="container-fluid">
                    <form class="d-flex" style="margin-left:4%;">
                        <img src="search.jpg" class="search-bar" />
                        <input class="form-control me-2" type="search" placeholder="chercher une offre"
                            aria-label="Search" style=" width:100% ;" id="inputrech" onkeyup="filtrer()">
                    </form>
                </div>
            </nav>
        </div>

            <div class="row g-3 align-items-center" style="margin-bottom: %;margin-left:2.5%;margin-top: 1%;">
                <div class="col-auto">
                    <h2 style="text-decoration-line: underline;;text-decoration-color: #0d6efd; text-align: left; ">
                        Les PV</h2>
                </div>
                <div class="col-auto" style="margin-top: 29px;">
                    <p class="fst-italic">{{count($offer)}} Total</p>
                </div>
            </div>
        <div id="tabl"  class="pv">
            <div class="row head" id="colo">
                <div class="col-2 text-center">N Offre</div>
                <div class="col-3 text-center">DATE D'OUVERTURE</div>
                <div class="col-6 text-center">Process Verbale</div>


            </div>
            <div class="scrol" >
                <b id="tst">
                @foreach ($offer as $offe)
                <div class="row" id="colo">
                    <div class="col-2 text-center" style="font-size:80%;"><span class="sp" id="sp">{{$offe[0]}}</span></div>
                    <div class="col-3">{{$offe[1]}} à partir du {{$offe[2]}}</div>
                    @if ($offe[4]=="rien_pv_one")
                    <div class="col">
                       {{-- <div class="close"><i class="fa fa-close" style="font-size: 0.9em;"  aria-hidden="true"></i>PV 1</div>--}}
                        <div class="add"><a href="{{url('pvone_one/'.$offe[3])}}">+ PV 1</a></div>
                    </div>
                    <div class="col">
                        <div class="close"><i class="fa fa-close" style="font-size: 0.9em;"  aria-hidden="true"></i> PV 2</div>
                    </div>
                    <div class="col">
                        <div class="close"><i class="fa fa-close" style="font-size: 0.9em;"  aria-hidden="true"></i>PV 3</div>
                    </div>
                    @elseif ($offe[4]=="pv_one_existe")

                    <div class="col">
                        <div class="download"> <a href="{{url('Imprimer_pv1/'.$offe[3])}}"><i class="fa fa-download" style="font-size: 0.9em;"  aria-hidden="true"></i>PV 1</a></div>
                        <div class="update" style="text-align: center;"><a href="{{url('supp_pv1/'.$offe[3])}}">Supprimer</a></div>
                    </div>
                    <div class="col">
{{--                        <div class="close"><i class="fa fa-close" style="font-size: 0.9em;"  aria-hidden="true"></i> PV 2</div>--}}
                        <div class="add"><a href="{{url('pvtwo_one/'.$offe[3])}}">+ PV 2</a></div>
                    </div>
                    <div class="col">
                        <div class="close"><i class="fa fa-close" style="font-size: 0.9em;"  aria-hidden="true"></i>PV 3</div>
                    </div>
                    @endif
                    @if ($offe[4]=="pv_one_existee" &&isset($offe[5]) && !isset($offe[6]))
                    <div class="col">
                        <div class="download"> <a href="{{url('Imprimer_pv1/'.$offe[3])}}"><i class="fa fa-download" style="font-size: 0.9em;"  aria-hidden="true"></i>PV 1</a></div>
                        <div class="update" style="text-align: center;"><a href="{{url('supp_pv1/'.$offe[3])}}">Supprimer</a></div>
                    </div>
                    <div class="col">
                        <div class="download"> <a href="{{url('Imprimer_pv2/'.$offe[3])}}"><i class="fa fa-download" style="font-size: 0.9em;"  aria-hidden="true"></i>PV 2</a></div>
                        <div class="update" style="text-align: center;"><a href="{{url('supp_pv2/'.$offe[3])}}">Supprimer</a></div>
                    </div>
                    <div class="col">
{{--                        <div class="close"><i class="fa fa-close" style="font-size: 0.9em;"  aria-hidden="true"></i>PV 3</div>--}}
                        <div class="add"><a href="{{url('pvthree_one/'.$offe[3])}}">+ PV 3</a></div>
                    </div>
                    @endif

                    @if ($offe[4]=="pv_one_existee" && isset($offe[5]) && isset($offe[6]) )
                    <div class="col">
                        <div class="download">
                            <a href="{{url('Imprimer_pv1/'.$offe[3])}}"><i class="fa fa-download" style="font-size: 0.9em;"  aria-hidden="true"></i>PV 1</a></div>
                        @if (auth()->user()->role == 'admin')
                        <div class="update" style="text-align: center;"><a href="{{url('supp_pv1/'.$offe[3])}}">Supprimer</a></div>
                        @endif
                    </div>
                    <div class="col">
                        <div class="download"> <a href="{{url('Imprimer_pv2/'.$offe[3])}}"><i class="fa fa-download" style="font-size: 0.9em;"  aria-hidden="true"></i>PV 2</a></div>
                                               @if (auth()->user()->role == 'admin')  <div class="update" style="text-align: center;"><a href="{{url('supp_pv2/'.$offe[3])}}">Supprimer</a></div>   @endif
                    </div>
                    <div class="col">
                        <div class="download"> <a href="{{url('Imprimer_pv3/'.$offe[3])}}"><i class="fa fa-download" style="font-size: 0.9em;"  aria-hidden="true"></i>PV 3</a></div>
                                               @if (auth()->user()->role == 'admin')<div class="update" style="text-align: center;"><a href="{{url('supp_pv3/'.$offe[3])}}">Supprimer</a></div>   @endif

                    </div>

                    @endif

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




