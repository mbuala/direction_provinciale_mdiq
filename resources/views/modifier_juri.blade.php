@extends('master.layout')
@section('title')
Modifier un jury
@endsection
@section('jury')active @endsection
@section('content')
<div class="content" style="margin-left:20% ;">
    <div class="sidetwo" style=" background-color: whitesmoke;height: 100%;">

        <div class="container">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <h2 style="text-decoration-line: underline;text-decoration-color: #0d6efd; text-align: left; ">
                        Modifer un jury</h2>
                </div>

            </div>
        </div>

        <form action="modifierjj/{{ $jurie['id'] }}" method="POST">
            {{csrf_field()}}
        <div class="container" style=" width: 90%;height: 60%;margin-top: 3%;">
            <div class="cardo">
                <div class="rows">
                    <div class="row">
                        <div class="col">

                            <label for="fname" class="control-label" id="lab-nom">le Nom du Jury</label>
                            <input type="text" class="form-control" id="inp-nom" placeholder="nom" value="{{$jurie['Nom']}}" name="nom">

                        </div>

                        <div class="col">
                            <label for="fname" class="control-label" id="lab-prenomnom">Prenom du jury</label>
                            <input type="text" class="form-control" id="inp-prenom" placeholder="prenom" value="{{$jurie['prenom']}}" name="prenom">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="fname" class="control-label" id="lab-nom">Profession du jury</label>
                            <input type="text" class="form-control" id="inp-nom" placeholder="profession" value="{{$jurie['profession']}}" name="profession">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="fname" class="control-label" id="lab-nom">Profession du jury</label>
                            <input type="text" class="form-control" id="inp-nom" placeholder="qualiter" value="{{$jurie['qualiter']}}" name="qualiter">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" id="ajouter-avis" style="width: 18%;margin-left:78%;margin-top : 1.5%;border-radius: 12px" value="Modifier">

                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
