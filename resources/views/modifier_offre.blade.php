@extends('master.layout')
@section('title')
modifier un offre
@endsection
@section('offre')active @endsection
@section('content')

<div class="content" style="margin-left:20% ;TOP:0;">

    <div class="container">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <h2 style="text-decoration-line: underline;text-decoration-color: #0d6efd; ">
                   Modifier un d'offre</h2>
            </div>
        </div>
        <div class="cardo">
            <form class="formul" action="modifierff/{{$md['id']}}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <label for="fname" class="control-label" id="lab-nom">Le numero de l'offre</label>
                            <input type="text" class="form-control" id="inp-nom" placeholder="NUM OFFRE" value="{{$md['Num']}}" name="num">
                        </div>
                        <div class="row">
                            <label for="fname" class="control-label">la Caution Provisoire</label>
                            <input type="text" class="form-control" id="inp-nom" placeholder="Caution Provisoire" value="{{$md['caution']}}" name="caution">
                        </div>
                        <div class="row">
                            <label for="startDate">le Montant d'estimation</label>
                            <input type="text" class="form-control" id="inp-nom" placeholder="AON°" value="{{$md['estimation']}}" name="estimation">
                        </div>
                    </div>
                    <div class="col">
                        <div class="row" style="height: 50%" >
                            <textarea class="texto" placeholder="écrire l'objet" name="objet">{{$md['objet']}}</textarea>
                        </div>
                        <div class="row" style="height: 50%" >
                            <textarea class="texto" placeholder="أكتب الموضوع بالعربية" name="objet_ar">{{$md['objet_ar']}}</textarea>
                        </div>
                    </div>
                </div><br><br>
                <input type="submit" class="btn btn-primary" id="ajouter-avis" style="width: 18%;margin-left:80% ;border-radius: 12px" value="modifier">


            </form>
        </div>

    </div>


</div>

@endsection
