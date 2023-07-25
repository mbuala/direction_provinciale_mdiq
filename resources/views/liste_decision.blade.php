@extends('master.layout')
@section('title')
Liste des décision
@endsection
@section('decision')active @endsection
@section('content')
<div class="content" style="margin-left:20% ;">
    <div class="sidetwo" style=" background-color: whitesmoke;height: 100%;">
        <div class="rech" style="margin-bottom:3%;margin-top: 2%;">
            <nav class="navbar navbar-light light">
                <div class="container-fluid">
                    <form class="d-flex" style="margin-left:4%;">
                        <img src="search.jpg" class="search-bar" />
                        <input class="form-control me-2" type="search" placeholder="chercher une décision"
                            aria-label="Search" style="  ;width:100% ;" id="inputrech" onkeyup="filtrer()">
                    </form>
                    <a class="btn btn-outline-primary" href="/ajouter_decision" role="button" style="margin-right:13%;"> <i
                            class="fa-duotone fa-plus"></i> Ajouter une nouvelle Décision </a>
                </div>
            </nav>
        </div>
        @if(Session::get('success'))
        <div class='alert alert-success'>
    {{Session::get('success')}}
        </div>
            @endif
            @if(Session::get('mdsucsser'))
            <div class='alert alert-success'>
        {{Session::get('mdsucsser')}}
            </div>
                @endif
                @if(Session::get('mdfail'))
            <div class='alert alert-success'>
        {{Session::get('mdfail')}}
            </div>
                @endif
            @if(Session::get('valider'))
            <div class='alert alert-success'>
        {{Session::get('valider')}}
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
                        Les décisions des avis</h2>
                </div>
                <div class="col-auto" style="margin-top: 29px;">
                    <p class="fst-italic">{{count($decisions)}} Total</p>
                </div>
            </div>

    <div id="tabl" class="decision">
        <div class="row head" id="colo">
            <div class="col">N AVIS</div>
            <div class="col">DATE OUVERTURE</div>
            <div class="col">OPERATION</div>
        </div>


        <div class="scrol">
            <b id="tst">
            @foreach ($decisions as $decision)

            <div class="modal fade" id="exampleModal{{$decision['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirmation de la supression</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Veuillez Vraiment Supprimer La decision du Numero {{$decision['num']}} ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                      <a href="{{url('supprimer_decision/'.$decision['id'] )}}" > <button type="button" class="btn btn-primary">Oui</button></a>
                    </div>
                  </div>
                </div>
              </div>



            <div class="row" id="colo">
                <div class="col"><span class="sp" id="sp">{{$decision['num']}}</span></div>
                <div class="col"><strong>{{$decision['date_ouverture']}}</strong>&ensp; À PARTIR DU &ensp;<strong>{{$decision['heure']}}</strong>&ensp;</div>
                <div class="col">
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$decision['id']}}">Supprimer</button>
                    <a href="{{url('modifier_decision/'.$decision['id']  )}}"><button type="button" class="btn btn-outline-primary">Modifier</button></a>&ensp;&ensp;&ensp;&ensp;
                    <a href="{{url('imprimer_decision/'.$decision['id'] )}}"> <button type="button" class="btn btn-outline-success">Imprimer</button></a>
                </div>
            </div>
            @endforeach
        </b>
        </div>
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
