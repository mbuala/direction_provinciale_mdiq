@extends('master.layout')
@section('title')
les informations du ganant
@endsection
<link href="/css/pv.css" rel="stylesheet">
@section('pv')active @endsection
@section('content')
<div class="content" style="margin-left:20%; margin-top: -2.5vh">
    <div class="sid">
        <form action="{{url('pvthree_three/'.$aviss->idss)}}" method="post">
@csrf
        <div class="row g-3 align-items-center" style="margin-bottom: 0.5%;margin-left:2.5%;margin-top: 1%;">
            <div class="col-auto">
            <h2 style="text-decoration-line: underline;;text-decoration-color: #0d6efd; text-align: left; ">
                    Completer les informations de l'entreprise
                </h2>
            </div>
        </div>

         <div class="avis-card" style="margin-top: 0% ;margin-bottom: 2%">
            <div class="row" id="glob" style="margin-bottom: 3% ; margin-top: 3%">
              Veuillez remplir les informations de l'entreprise
            </div>
        <div class="row" id="entrep" style="margin-top: 0% ; margin-bottom: 2%% ;">
            <div class="container" style="padding: 1% 2% 1% 2%;">
                <div class="row">
                    <div class="col-sm">
                        <label  class="control-label">Nom de l'entreprise</label>
                        <input type="text" class="form-control" placeholder="Nom" disabled value="{{$concurrents->Nom}}">
                        <input type="hidden" name="id_concu" name="id_gangant" value="{{$concurrents->id}}">
                    </div>
                    <div class="col-sm">
                        <label  class="control-label">Nom complet du gérant</label>
                        <input type="text" class="form-control" placeholder="" name="nom_gerant" value="{{ old('nom_gerant')}}">
                    </div>
                    <div class="col-sm">
                        <label  class="control-label">Qualité</label>
                        <input type="text" class="form-control" placeholder="qualité" name="qualiter" value="{{ old('qualiter')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label  class="control-label">Numero CNSS</label>
                        <input type="text" class="form-control" placeholder="CNSS" name="cnss" value="{{ old('cnss')}}">
                    </div>
                    <div class="col-sm"></div>
                    <div class="col-sm"></div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label  class="control-label">Capital social</label>
                        <input type="text" class="form-control" placeholder="Capital" name="capital" value="{{ old('capital')}}">
                    </div>
                    <div class="col-sm">
                        <label  class="control-label">Adresse de l'entreprise</label>
                        <input type="text" class="form-control" placeholder="Adresse" name="adresse" value="{{ old('adresse')}}">
                    </div>
                    <div class="col-sm">

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label  class="control-label">Numero de registre</label>
                        <input type="text" class="form-control" placeholder="Numero" name="registre" value="{{ old('registre')}}">
                    </div>
                    <div class="col-sm"></div>
                    <div class="col-sm"></div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label  class="control-label">RIB</label>
                        <input type="text" class="form-control" placeholder="RIB" name="ribe" value="{{ old('ribe')}}">
                    </div>
                    <div class="col-sm">
                        <label  class="control-label">Ouvert auprés</label>
                        <input type="text" class="form-control" placeholder="Nom du la banque" name="bq" value="{{ old('bq')}}">
                    </div>
                    <div class="col-sm">
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
                <input type="submit" style="height:40% ;width: 16%" class="btn btn-primary" value="Suivant">
            </div>
          </div>
        </form>
</div>
</div>

@endsection
