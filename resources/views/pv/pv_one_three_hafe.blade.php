@extends('master.layout')
@section('title')
les concurrents réserver
@endsection
<link href="/css/pv.css" rel="stylesheet">
@section('pv')active @endsection
@section('content')
<form action="{{url('pvone_five/'.$aviss->idss)}}" method="post">
    @csrf
<div class="content" style="margin-left:20%; margin-top: -2.5vh">
    <div class="sid">
        <div class="row g-3 align-items-center" style="margin-bottom: 0.5%;margin-left:2.5%;margin-top: 1%;">
            <div class="col-auto">
            <h2 style="text-decoration-line: underline;;text-decoration-color: #0d6efd; text-align: left; ">
                    Creation PV N °1 </h2>
            </div>
        </div>

        <div class="avis-info" style="margin-bottom: 0%">
            <div class="row" id="glob" style="margin-bottom: 3% ; margin-top: 1%">
                Les informations d'avis
            </div>


            <div class="row" id="stab" style="margin-top: 0% ; margin-bottom: 0%">
                <div class="col-sm">
                <label  class="control-label">numero d'avis</label>
                <input type="text" class="form-control" disabled value="{{$aviss->num_avis}}">
              </div>
              <div class="col-sm">
                <label  class="control-label">Date d'ouverture</label>
                <input type="text" class="form-control" disabled value="{{$aviss->date_ouverture}}">
              </div>
              <div class="col-sm">
                <label  class="control-label">Heure d'ouverture</label>
                <div class="heur" style="display: flex">
                    <div class="col"  style="max-width: 60%;margin-left:0%" >
                        <input type="text" class="form-control" disabled value="{{$aviss->heure}}">
                    </div>

                </div>
              </div>
        </div>
    </div>
         <div class="avis-card" style="margin-top: 0% ;margin-bottom: 0%">
            <div class="row" id="glob" style="margin-bottom: 2% ; margin-top: 3%">
              Les concurrents avec réserve
            </div>
        <div class="row" id="infor"  style="margin-top: 0% ; margin-bottom: 0% ;">
            <div class="container">
                <div id="tap" class="elimin">
                    <div class="row hed">
                        <div class="col">Numero</div>
                        <div class="col">Nom </div>
                        <div class="col">Réserver</div>
                        <div class="col">Objet de la réserve</div>
                    </div>
                    <div class="cl">
                        @for ($i = 1; $i <= count($noms); $i++)
                        <div class="row" >
                            <div class="col">{{$i+1}}</div>
                            <div class="col">{{$noms[$i-1]->Nom}}<input type="hidden" name='nomss[]' value="{{$noms[$i-1]->Nom}}"></div>
                            <div class="col">
                                <input type="checkbox" name='res{{$i}}' value="reserve">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Objet de la réserve" name="objet_res{{$i}}">
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row" id="next-prev" style="height: 12vh;display : flex ;margin-top:0% ;margin-left: 6%;">
            <div class="col-sm" style="FONT-WEIGHT : BOLD ;font-size: 75%;padding-right: 0%;
            max-height:90%;max-width: 35%;">
                <label style="color : rgb(124, 124, 124);">Avant de passer à la page suivante :</label><br>
            <label style="margin-left:5% ;color : rgb(124, 124, 124);">- Veulliez remplir tous les champs</label><br>
            <label style="margin-left:5% ;color : rgb(124, 124, 124);">- Veulliez verifier tous les informations</label>
            </div>
            <div class="col-sm" style="display: flex; padding-left: 0.7% ;padding-top: 1%">
                <input type="submit" style="height:40% ;width: 16%" class="btn btn-primary" value="suivant">
            </div>
          </div>

</div></form>
</div>
@endsection
