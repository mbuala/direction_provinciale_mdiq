@extends('master.layout')
@section('title')
Telecharger PV 1
@endsection
<link href="/css/pv.css" rel="stylesheet">
@section('pv')active @endsection
@section('content')
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
                <input type="text" class="form-control"  disabled value="{{$aviss->num_avis}}">
              </div>
              <div class="col-sm">
                <label  class="control-label">Date d'ouverture</label>
                <input type="text" class="form-control"  disabled value="{{$aviss->date_ouverture}}">
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
            <div class="row" id="glob" style="margin-bottom: 3% ; margin-top: 3%">
                Vous pouvez maintenant telecharger PV 1
                        </div>
                        <a href="{{url('process_verbal/')}}">     <div class="row" id="infor"  style="margin-top: 0% ; margin-bottom: 0% ;">
            <div class="pv1">
                        <button class="btn">
                                <i class="fa fa-download"></i> <SPAN>PV 1</SPAN></button>
                    </div>
                </div></a>
            </div>

        </div>
</div>
</div>
@endsection
