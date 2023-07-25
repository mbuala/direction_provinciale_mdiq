@extends('master.layout')
@section('title')
ajouter un offre
@endsection
@section('offre')active @endsection
@section('content')

<div class="content" style="margin-left:20% ;TOP:0;">

    <div class="container">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <h2 style="text-decoration-line: underline;text-decoration-color: #0d6efd; ">
                    ajouter un d'offre</h2>
            </div>
        </div>
        <div class="cardo">
            <form class="formul"  action="add_offre" method="post">
                @csrf
                <div class="row">
                    <div class="col">

                        <div class="row">

                            <label for="fname" class="control-label" id="lab-nom">Entrer numero de l'offre</label>
                            <input type="text" class="form-control" id="inp-nom" placeholder="NOM" name="num_off" value="{{ old('num_off')}}">
                            <span style='color:red;'> @error('num_off'){{ $message}}@enderror</span>
                        </div>
                        <div class="row">
                            <label for="fname" class="control-label">Entrer la Caution Provisoire</label>
                            <input type="number" class="form-control" id="inp-nom" placeholder="Caution Provisoire" name="caution" value="{{ old('caution')}}">
                            <span style='color:red;'> @error('caution'){{ $message}}@enderror</span>
                        </div>
                        <div class="row">
                            <label for="startDate">Entrer le Montant d'estimation</label>
                            <input type="number" class="form-control" id="inp-nom" placeholder="AON°" name="estimation" value="{{ old('estimation')}}">
                            <span style='color:red;'> @error('estimation'){{ $message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row" style="height: 50%" >
                            <textarea class="texto" placeholder="écrire l'objet en français" name="objet">{{ old('objet')}}</textarea>
                            <span style='color:red;'> @error('objet'){{ $message}}@enderror</span>
                        </div>

                        <div class="row" style="height: 50%" >
                            <textarea class="texto" placeholder="أكتب الموضوع بالعربية" name="objetar">{{ old('objetar')}}</textarea>
                            <span style='color:red;'> @error('objetar'){{ $message}}@enderror</span>
                        </div>
                    </div>
                </div>
<br><br><br><br>


                <input type="submit" class="btn btn-primary" id="ajouter-avis" style="width: 18%;margin-left:80% ;border-radius: 12px" value="Ajouter">


            </form>
        </div>

    </div>


</div>

@endsection
