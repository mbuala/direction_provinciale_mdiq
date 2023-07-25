@extends('master.layout')
@section('title')
Telecharger PV 3
@endsection
<link href="/css/pv.css" rel="stylesheet">
@section('pv')active @endsection
@section('content')
<div class="content" style="margin-left:20%; margin-top: -2.5vh">
    <div class="sid">
        <div class="row g-3 align-items-center" style="margin-bottom: 0.5%;margin-left:2.5%;margin-top: 1%;">
            <div class="col-auto">
            <h2 style="text-decoration-line: underline;;text-decoration-color: #0d6efd; text-align: left; ">
                    Creation PV N °3 </h2>
            </div>
        </div>
        <div class="avis-info" style="margin-bottom: 0%">
            <div class="row" id="glob" style="margin-bottom: 1% ; margin-top: 1%">
                Les informations d'avis
            </div>
            <div class="row" id="stab" style="margin-top: 0% ; margin-bottom: 0%">
                <div class="col-sm">
                <label  class="control-label">numero d'avis</label>
                <input type="text" class="form-control" disabled>
              </div>
              <div class="col-sm">
                <label  class="control-label">Date d'ouverture</label>
                <input type="text" class="form-control"  disabled>
              </div>
              <div class="col-sm">
                <label  class="control-label">Heure d'ouverture</label>
                <div class="heur" style="display: flex">
                    <div class="col"  style="max-width: 30%;margin-left:0%" >
                        <input type="text" class="form-control"  disabled>
                    </div>
                    <div class="col"  style="max-width: 2% ;padding-top:2.3%">
                        <label class="control-label">:</label>                            </div>
                    <div class="col"   style="max-width: 30% ;margin-left:0%">
                        <input type="text" class="form-control" disabled >
                    </div>
                    <div class="col"  style="max-width: 8.5% ;padding-top:2.3%" >
                        <label class="control-label">pm</label>
                    </div>
                </div>
              </div>
        </div>
    </div>
         <div class="avis-card" style="margin-top: 0% ;margin-bottom: 0%">
            <div class="row" id="glob" style="margin-bottom: 1% ; margin-top: 3%">
               Vous pouvez maintenant telecharger PV 3
            </div>
        <div class="row" id="infor"  style="margin-top: 0% ; margin-bottom: 0% ;">
                    <div class="pv1">
                        <button class="btn">
                            <a href="#"><i class="fa fa-download"></i> <SPAN>PV 3</SPAN>
                            </a></button>
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
                <div class="col-sm" style="display: flex;padding-right: 0% ;max-width: 70%;padding-top: 1%">
                    <a href="" style="height:40% ;width: 20%;border-radius: 15px 15px 15px 15px;margin-left: 4.2%" class="btn btn-primary">Avant</a>
             </div>
              </div>
        </div>
</div>
</div>
@endsection
