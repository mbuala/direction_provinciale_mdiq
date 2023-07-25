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
                       Ajouter une décision</h2>
                </div>
            </div>
            <div class="cardo">
                <form class="formul" action="ajoute_decision" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label style="margin-bottom: 3%; margin-top: 0%;">choisir les offres de cette
                                avis</label>
                            <div class="cadrone">
                                <label>Entrer Numéro d'avis</label>
                                <label style='color:red;'> @error('num_avis'){{ $message}}@enderror</label>
                                <input type="text" class="form-control" placeholder="Numéro">
                                <div class="tablo" style="margin-left: 5%;">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Cocher
                                            </label>
                                        </div>
                                        <div class="col">les numéro d'avis</div>

                                    </div>
                                    @foreach ($aviss as $avis)

                                    <div class="row">
                                        <div class="col"><input class="form-check-input" type="radio" name="num_avis" value="{{$avis['num_avis']}}">
                                            <label class="form-check-label" for="flexCheckDefault">
                                        </div>
                                        <div class="col">{{$avis['num_avis']}}</div>
                                    </div>
                                    @endforeach

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
                                    <div class="row">

                                        <div class="col"><i id="ff"><input class="form-check-input" type="checkbox" id="jerr" name="jeri[]"  value="{{$juri['id']}}"></i>
                                            <label class="form-check-label" for="flexCheckDefault">
                                        </div>
                                        <div class="col"><span class="sp" id="sp">{{$juri['Nom']}}</span></div>
                                        <div class="col">{{$juri['prenom']}}</div>
                                        <div class="col">{{$juri['qualiter']}}</div>
                                    </div>
                                    @endforeach
                                </b>
                                </div>
                            </div>
                        </div>
                    </div>



                    <input type="submit" class="btn btn-primary" style="width: 18%;margin-left:78% ;border-radius: 12px" value="Ajouter">


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
