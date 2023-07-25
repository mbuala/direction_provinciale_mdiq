@extends('master.layout')
@section('title')
Liste des décision
@endsection
@section('decision')active @endsection
@section('content')
 <div class="content" style="margin-left:20% ;TOP:0;">

        <div class="container">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <h2 style="text-decoration-line: underline;text-decoration-color: #0d6efd; ">
                       Modifier une décision</h2>
                </div>
            </div>
            <div class="cardo">
                <form class="formul" action="md_dec/{{$decision_info->id}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col">
                            <label style="margin-bottom: 3%; margin-top: 0%;">l'avis de cette
                                Décision</label>
                            <div class="cadrone">
                                <div class="tablo" style="margin-left: 5%;">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-check-label" for="flexCheckDefault">

                                            </label>
                                        </div>
                                        <div class="col">le numéro d'avis de cette décision</div>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="num_avis" value="{{$decision_info->num_decision}}" checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                        </div>
                                        <div class="col">{{$decision_info->num_decision}}</div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label style="margin-bottom: 3%;">choisir les jury</label>
                            <div class="cadrone">
                                <label>Entrer nom de jury</label>
                                <label style='color:red;'> @error('jeri'){{ $message}}@enderror</label>
                                <input type="text" class="form-control" placeholder="Nom" id="inputrech" onkeyup="filtrer()">
                                <div class="tablo tablotwo" style="margin-left: 5%;">
                                    <div class="row">
                                        <div class="col"> <input class="form-check-input" type="checkbox" id="tous" onchange="cocher()">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Tous
                                            </label>
                                        </div>
                                        <div class="col">Nom</div>
                                        <div class="col">Prenom</div>
                                        <div class="col">Qualité</div>
                                    </div>
                                    <b id="tst">
                                    @foreach ($juries as $juri)
                                    @if ($juri[1]=="kayn")
                                    <div class="row">
                                        <div class="col"><i id="ff"><input class="form-check-input" type="checkbox" id="jerr" name="jeri[]"  value="{{$juri[4]}}" checked></i>
                                            <label class="form-check-label" for="flexCheckDefault">
                                        </div>
                                        <div class="col"><span class="sp" id="sp">{{$juri[0]}}</span></div>
                                        <div class="col">{{$juri[2]}}</div>
                                        <div class="col">{{$juri[3]}}</div>
                                    </div>
                                    @elseif ($juri[1]=="m_kayn")
                                    <div class="row">
                                        <div class="col"><i id="ff"><input class="form-check-input" type="checkbox" id="jerr" name="jeri[]"  value="{{$juri[4]}}"></i>
                                            <label class="form-check-label" for="flexCheckDefault">
                                        </div>
                                        <div class="col"><span class="sp" id="sp">{{$juri[0]}}</span></div>
                                        <div class="col">{{$juri[2]}}</div>
                                        <div class="col">{{$juri[3]}}</div>
                                    </div>
                                    @endif
                                    @endforeach
                                </b>
                                </div>
                            </div>
                        </div>
                    </div>



                    <input type="submit" class="btn btn-primary" style="width: 18%;margin-left:78% ;border-radius: 12px" value="Modifier">


                </form>
            </div>

        </div>


    </div>


    <script>

        function filtrer(){
            var aa,txt
        var rech=document.getElementById("inputrech").value.toUpperCase();
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
                spid.getElementsByClassName('row')[i].style.display="";
        }

        }


        }




        }

        function cocher(){

           var ele=document.getElementsByName('jeri[]');
           if(document.getElementById("tous").checked){
for(var i=0; i<ele.length; i++){
  if(ele[i].type=='checkbox')
    ele[i].checked=true;
}
}

if(!document.getElementById("tous").checked){
for(var i=0; i<ele.length; i++){
  if(ele[i].type=='checkbox')
    ele[i].checked=false;
}
}
}
        </script>


    @endsection
