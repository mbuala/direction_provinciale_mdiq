@extends('master.layout')
@section('title')
Journal
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
                <label  class="control-label">Numéro d'avis</label>
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
                        <input type="text" class="form-control"  disabled value="{{$aviss->heure}}">
                    </div>
                </div>
              </div>
        </div>
    </div>
    @if(Session::get('faild'))
    <div class='alert alert-danger'>
{{Session::get('faild')}}
    </div>
        @endif
<form action="{{url('pvone_two_rec/'.$aviss->idss)}}" method="post">
    @csrf
         <div class="avis-card" style="margin-top: 0% ;margin-bottom: 0%">
            <div class="row" id="glob" style="margin-bottom: 3% ; margin-top: 3%">
                Les informations de journal d'avis rectificatif
            </div>
            <label style='color:red;'> @error('type_journal'){{ $message}}@enderror</label>
        <div class="row" id="infor"  style="margin-top: 0% ; margin-bottom: 0% ;">
            <div class="row" id="check">
                <div class="col-sm"  id="matin" style="margin-top: 0%">

                    <div class="row"  id="journal-title" >
                       Le Matin
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label  class="control-label">Numero :</label>
                            <input type="text" class="form-control" tyle="padding-left: 0%" placeholder="" name="num_matin" value="{{ old('num_matin')}}">
                            <label style='color:red;'> @error('num_matin'){{ $message}}@enderror</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label  class="control-label">Date :</label>
                            <input type="text" class="form-control" style="padding-left: 0%" placeholder="Jour / Mois / Anné"  name="date_matin" value="{{ old('date_matin')}}">
                            <label style='color:red;'> @error('date_matin'){{ $message}}@enderror</label>
                        </div>
                        <div class="col-sm">
                            <label  class="control-label">Page :</label>
                            <input type="text" class="form-control" style="padding-left: 0%" placeholder="Numero de page" name="page_matin" value="{{ old('page_matin')}}">
                            <label style='color:red;'> @error('page_matin'){{ $message}}@enderror</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm" id="sahra" >

                    <div class="row" id="journal-title" lang="AR">
                     الصحراء المغربية
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label  class="control-label">Numero :</label>
                            <input type="text" class="form-control" style="padding-left: 0%" placeholder="" name="num_sahara"  value="{{ old('num_sahara')}}">
                            <label style='color:red;'> @error('num_sahara'){{ $message}}@enderror</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label  class="control-label">Date :</label>
                            <input type="text" class="form-control" style="padding-left: 0%" placeholder="Jour / Mois / Anné" name="date_sahara" value="{{ old('date_sahara')}}">
                            <label style='color:red;'> @error('date_sahara'){{ $message}}@enderror</label>
                        </div>
                        <div class="col-sm">
                            <label  class="control-label">Page :</label>
                            <input type="text" class="form-control" style="padding-left: 0%" placeholder="Numero de page" name="page_sahara" value="{{ old('page_sahara')}}">
                            <label style='color:red;'> @error('page_sahara'){{ $message}}@enderror</label>
                        </div>
                    </div>
                </div>
            </div>
    <input type="submit" class="btn btn-primary" style="width: 15%;margin-left:43%;margin-top: 7% ; padding-top: 0.4%;border-radius: 12px ;height: 10%;"  value="Ajouter">
          </div>
        </div>
    </form>
        <div class="row" id="next-prev" style="height: 12vh;display : flex ;margin-top:0% ;margin-left: 6%;">
            <div class="col-sm" style="FONT-WEIGHT : BOLD ;font-size: 75%;padding-right: 0%;
            max-height:90%;max-width: 35%;">
                <label style="color : rgb(124, 124, 124);">Avant de passer à la page suivante :</label><br>
            <label style="margin-left:5% ;color : rgb(124, 124, 124);">- Veulliez remplir tous les champs</label><br>
            <label style="margin-left:5% ;color : rgb(124, 124, 124);">- Veulliez verifier tous les informations</label>
            </div>
            <div class="col-sm" style="display: flex;padding-right: 0% ;max-width: 70%;padding-top: 1%">
                <a href="{{url('pvone_tw/'.$aviss->idss)}}" style="height:40% ;width: 20%;border-radius: 15px 15px 15px 15px;margin-left: 4.2%" class="btn btn-primary">Suivant</a>
         </div>
          </div>
</div>
</div>
@endsection
