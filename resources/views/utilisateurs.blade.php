@extends('master.layout')
@section('title')
Liste des Utilisateur  

 <div id="tabl" class="jury">
            <div class="row head" id="colo">
                <div class="col" style="max-width:10%">N</div>
                <div class="col">NOM</div>
                <div class="col">PRENOM</div>
                <div class="col">Qualiter</div>
                <div class="col">OPERATION</div>
            </div>
            <div class="scrol">
                @php
                $i = 0
                @endphp
                <b id="tst">
@foreach ($utilisateurs as $utilisateur)
<div class="row" id="colo">
    @php
    $i++
    @endphp

<div class="modal fade" id="exampleModal{{$utilisateur['Nom']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation de la supression</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Veuillez Vraiment Supprimer Monsieur {{$utilisateur['name']}} {{$utilisateur['name']}} ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
          <a    href="{{url('supprimer_jurry/'.$utilisateur['id'] )}}" > <button type="button" class="btn btn-primary">Oui</button></a>
        </div>
      </div>
    </div>
  </div>


                    <div class="col" style="max-width:10%">@php
                        echo $i
                        @endphp</div>
                    <div class="col"><span class="sp" id="sp" >{{$utilisateur['name']}}</span></div>
                    <div class="col">{{$utilisateur['email']}}</div> 
                    <div class="col">
                        <input type="submit" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$utilisateur['Nom']}}" href="#" role="button" value="Supprimer">
                        <a    href="{{url('modifier_user/'.$utilisateur['id'] )}}" ><input type="submit" class="btn btn-outline-primary" href="#" role="button" value="Modifier"></a>

                    </div>
                </div>
                    @endforeach
            </b>

            </div>
        </div>
@endsection
@section('content')
<div class="content" style="margin-left:20% ;">

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Confirmation de la supression</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Veuillez Vraiment Supprimer Monsieur Ahmed El Ghayoubi ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
              <button type="button" class="btn btn-primary">Oui</button>
            </div>
          </div>
        </div>
      </div>
  @if(Session::get('success'))
        <div class='alert alert-success'>
    {{Session::get('success')}}
        </div>
            @endif

            @if(Session::get('fail'))
        <div class='alert alert-danger'>
    {{Session::get('fail')}}
        </div>
            @endif
    <div class="sidetwo" style=" background-color: whitesmoke;height: 100%;">
        <div class="rech" style="margin-bottom:3%;margin-top: 2%;">
            <nav class="navbar navbar-light light">
                <div class="container-fluid">
                    <form class="d-flex" style="margin-left:4%;">
                        <img src="search.jpg" class="search-bar" />
                        <input class="form-control me-2" type="search" placeholder="Taper le NOM"
                            aria-label="Search" style="  ;width:100% ;" id="inputrech" onkeyup="filtrer()">
                    </form>
                    <a class="btn btn-outline-primary" href="/ajouter_user" role="button" style="margin-right:13%;"> <i
                            class="fa-duotone fa-plus"></i> Ajouter un nouveau Utilisateur</a>
                </div>
            </nav>
        </div>

            <div class="row g-3 align-items-center" style="margin-bottom: %;margin-left:2.5%;margin-top: 1%;">
                <div class="col-auto">
                    <h2 style="text-decoration-line: underline;;text-decoration-color: #0d6efd; text-align: left; ">
                        Les utilisateurs</h2>
                </div>
                <div class="col-auto" style="margin-top: 29px;">
                    <p class="fst-italic">{{count($utilisateurs)}} Total</p>
            </div>
            </div>

   <div id="tabl" class="jury">
            <div class="row head" id="colo">
                <div class="col" style="max-width:10%">N</div>
                <div class="col">NOM</div>
                <div class="col">EMAIL</div> 
                <div class="col">ACTION</div> 
            </div>
            <div class="scrol">
                @php
                $i = 0
                @endphp
                <b id="tst">
@foreach ($utilisateurs as $utilisateur)
<div class="row" id="colo">
    @php
    $i++
    @endphp

<div class="modal fade" id="exampleModal{{$utilisateur['name']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation de la supression</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Veuillez Vraiment Supprimer  {{$utilisateur['name']}}   ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
          <a    href="{{url('delete_user/'.$utilisateur['id'] )}}" > <button type="button" class="btn btn-primary">Oui</button></a>
        </div>
      </div>
    </div>
  </div>


                    <div class="col" style="max-width:10%">
                    	@php
                        echo $i
                        @endphp</div>
                    <div class="col"><span class="sp" id="sp" >{{$utilisateur['name']}}</span></div>
                    <div class="col">{{$utilisateur['email']}}</div>
              
                    <div class="col">
                        <input type="submit" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$utilisateur['name']}}" href="#" role="button" value="Supprimer">
                        <a    href="{{url('modifier_user/'.$utilisateur['id'] )}}" ><input type="submit" class="btn btn-outline-primary" href="#" role="button" value="Modifier"></a>

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