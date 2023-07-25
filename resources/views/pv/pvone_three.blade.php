@extends('master.layout')
@section('title')
les informations des concurrents
@endsection
<link href="/css/pv.css" rel="stylesheet">
@section('pv')active @endsection
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
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
                <input type="text" class="form-control"disabled value="{{$aviss->num_avis}}">
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
<form action="{{url('pvone_four/'.$aviss->idss)}}" method="post">
    @csrf
         <div class="avis-card" style="margin-top: 0% ;margin-bottom: 0%">
            <div class="row" id="glob" style="margin-bottom: 3% ; margin-top: 3%">
             Veuillez ajouter les informations des concurrents
            </div>
            <input type="hidden" value="{{$aviss->concurrent}}" name="hiddeninput">
        <div class="row" id="infor"  style="margin-top: 0% ; margin-bottom: 0% ;">
            <div class="container">
                <div id="tap" class="elimin">
                    <div class="row hed">
                        <div class="col">Numero</div>
                        <div class="col">Nom </div>
                        <div class="col">postulez</div>
                        <div class="col">dossier complet</div>
                        <div class="col">La Présence</div>
                    </div>
                    <div class="cl">
                        @for ($i = 1; $i <= $aviss->concurrent; $i++)


                        <div class="row" >
                            <div class="col">{{$i}}</div>
                            <div class="col">
                                <input  id="{{$i}}" list="villes{{$i}}" type="text" class="vi form-control" name="n[]" required>
                                <datalist  id="villes{{$i}}" >

                                </datalist>
                                </div>

                            <script>
                                $("#"+{{$i}}).on("keyup",function(event) {
                                    var id=$(this).attr('id');
                                    var value=$("#"+id).val();
                                    var url= "{{url('/')}}"+'/getConcurrentsByHints/'+value;
                                    $.ajax({
                                        url: url,
                                        method: 'get',
                                    }).done(function(response) {
                                        $("#villes"+id+" option").remove();
                                        var concurrents = JSON.parse(response);
                                        concurrents.forEach(function(item){
                                            $('#villes'+id).append("<option vlaue='" + item.Nom + "'>" + item.Nom + "</option>");
                                        })
                                    })
                                });
                            </script>
                            <div class="col">
                               <span> <input type="radio" name="p{{$i}}[]" value="Electronique"> El</span>
                               <span> <input type="radio" name="p{{$i}}[]" value="Physique"> Ph</span>
                            </div>
                            <div class="col">
                                <span> <input type="radio" name="d{{$i}}[]" value="oui"> Oui</span>
                                <span> <input type="radio" name="d{{$i}}[]" value="non"> Non</span>
                             </div>
                            <div class="col">
                                <span style="max-width: 80%"> <input type="radio" name='ex{{$i}}[]' value="existe"> Présent</span>
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
        </form>
</div>
</div>
@endsection
