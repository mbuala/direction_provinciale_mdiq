@extends('master.layout')
@section('title')
liste des avis
@endsection
@section('avis')active @endsection

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
                    <a class="btn btn-outline-primary" href="/ajouter_avis" role="button" style="margin-right:13%;"> <i
                            class="fa-duotone fa-plus"></i> Ajouter une nouvelle avis </a>
                </div>
            </nav>
        </div>
        @if(Session::get('success'))
        <div class='alert alert-success'>
    {{Session::get('success')}}
        </div>
            @endif
            @if(Session::get('vv'))
        <div class='alert alert-success'>
    {{Session::get('vv')}}
        </div>
            @endif
            @if(Session::get('fail'))
        <div class='alert alert-danger'>
    {{Session::get('fail')}}
        </div>
            @endif
            <div class="row g-3 align-items-center" style="margin-bottom: %;margin-left:2.5%;margin-top: 1%;">
                <div class="col-auto">
                    <h2 style="text-decoration-line: underline;;text-decoration-color: #0d6efd; text-align: left; ">
                        Les avis d'appels d'offres</h2>
                </div>
                <div class="col-auto" style="margin-top: 29px;">
                    <p class="fst-italic">{{count($avis)}} Total</p>
                </div>
            </div>


        <div id="tabl" class="avis">
            <div class="row head" id="colo">
                <div class="col">N AVIS</div>
                <div class="col">DATE OUVERTURE</div>
                <div class="col">Heure D'OUVERTURE</div>
                <div class="col">OPERATION</div>
            </div>
            <div class="scrol">
                <b id="tst">
                @foreach ($avis as $avi)


                <div class="modal fade" id="exampleModal{{$avi['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Confirmation de la supression</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Veuillez Vraiment Supprimer L'avis d'appel d'offre du Numero {{$avi['num_avis']}} ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                          <a    href="{{url('suprimer_aviss/'.$avi['id'] )}}" > <button type="button" class="btn btn-primary">Oui</button></a>
                        </div>
                      </div>
                    </div>
                  </div>


                <div class="row" id="colo">
                    <div class="col"><span class="sp" id="sp">{{$avi['num_avis']}}</span></div>
                    <div class="col"><strong>{{$avi['date_ouverture']}}</strong></div>
                    <div class="col"><strong>{{$avi['heure']}}</strong></div>
                    <div class="col">
                       <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$avi['id']}}">Supprimer</button>
                        <a href="{{url('modifier_avis/'.$avi['id'] )}}"><button type="button" class="btn btn-outline-primary">Modifier</button></a>&ensp;&ensp;&ensp;&ensp;
                       <a href="{{url('imprimer_aviss/'.$avi['id'] )}}"> <button type="button" class="btn btn-outline-success">Imprimer</button></a>
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
