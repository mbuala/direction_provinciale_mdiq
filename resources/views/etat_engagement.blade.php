@extends('master.layout')
@section('title')
d'engagement
@endsection
@section('etat_engagement')active @endsection

@section('content')
<div class="content" style="margin-left:20% ;">
    <div class="sidetwo" style=" background-color: whitesmoke;height: 100%;">
        <div class="rech" style="margin-bottom: 39px;margin-top: 0px;">
            <nav class="navbar navbar-light light">

            </nav>
        </div>

        <div class="container" style=" width: 90%;margin-top: 3%;">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <h2 style="text-decoration-line: underline;text-decoration-color: #0d6efd; text-align: left; ">
                        Etat d'engagement</h2>
                </div>

                @if(Session::get('fail'))
                <div class='alert alert-danger'>
            {{Session::get('fail')}}
                </div>
                    @endif
            </div>
            <div class="cardo">
                <form class="formul" action="imprimer_etat" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="in" style="margin-bottom: 20px;">choisir le numero d'article</label>
                            <div class="form-group">

                                <select class="select" name="art">
                                    @if (old('art'))
                                        <option value="{{ old('art')}}" selected>{{ old('art')}}</option>
                                        <option value="900">900</option>
                                    <option value="901">901</option>
                                    <option value="902">902</option>
                                    <option value="912">912</option>
                                    @else
                                    <option selected disabled style="text-align: center;">N° Article</option>
                                    <option value="900">900</option>
                                    <option value="901">901</option>
                                    <option value="902">902</option>
                                    <option value="912">912</option>
                                     @endif
                                </select>
                                <label>Art</label>
                                <span style='color:red;'> @error('art'){{ $message}}@enderror</span>
                            </div>
</div>

                        <div class="col">
                            <label for="fname" class="control-label" id="lab-prenomnom">Entrer le numéro de marché</label>
                            <input type="text" class="form-control" id="inp-prenom" name="nmarcher" value="{{ old('nmarcher')}}">
                            <span style='color:red;'> @error('nmarcher'){{ $message}}@enderror</span>  </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="in" style="margin-bottom: 15px;">choisir le numero de paragraphe</label>
                            <div class="form-group">

                                <select class="select" name="parg">
                                    @if (old('parg'))
                                        <option value="{{ old('parg')}}" selected>{{ old('parg')}}</option>
                                        <option value="10">10</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="50">50</option>
                                        <option value="51">51</option>
                                        <option value="60">60</option>
                                        <option value="61">61</option>
                                        <option value="71">71</option>
                                    @else
                                    <option selected disabled style="text-align: center;">N° Parg</option>
                                    <option value="10">10</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="60">60</option>
                                    <option value="61">61</option>
                                    <option value="71">71</option>
                                    @endif
                                </select>
                                <label>Parg</label>
                                <span style='color:red;'> @error('parg'){{ $message}}@enderror</span>      </div>
                        </div>

                        <div class="col">
                            <label for="fname" class="control-label" id="lab-prenomnom">Entrer le montant du
                                marché</label>
                            <input type="number" class="form-control" id="inp-prenom" name="marchermantant" value="{{ old('marchermantant')}}">
                            <span style='color:red;'> @error('marchermantant'){{ $message}}@enderror</span>     </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col">
                            <label class="in" style="margin-bottom: 15px;">choisir le numero de ligne</label>
                            <div class="form-group">

                                <select class="select" name="lign">
                                    @if (old('lign'))
                                    <option value="{{ old('lign')}}" selected>{{ old('lign')}}</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="41">41</option>
                                @else
                                    <option selected disabled style="text-align: center;">N° Ligne</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="41">41</option>
                                    @endif
                                </select>
                                <label>Ligne</label>
                                <span style='color:red;'> @error('lign'){{ $message}}@enderror</span>  </div>
                        </div>

                        <div class="col">
                            <label for="fname" class="control-label" id="lab-prenomnom">Entrer le montant du marché
                                YC/ S.A.V</label>
                            <input type="number" class="form-control" id="inp-prenom" name="marcheryc" value="{{ old('marcheryc')}}">
                            <span style='color:red;'> @error('marcheryc'){{ $message}}@enderror</span>   </div>

                    </div>
                    <div class="row">

                        <div class="col">
                            <label for="fname" class="control-label" id="lab-prenomnom">Entrer le numéro d'etat d'engagement</label>
                            <input type="text" class="form-control" id="inp-prenom" placeholder="01/INV" name="netat" value="{{ old('netat')}}">
                            <span style='color:red;'> @error('netat'){{ $message}}@enderror</span>
                        </div>
                        <div class="col">
                            <label for="fname" class="control-label" id="lab-prenomnom">Entrer le montant de crédit
                                engagé</label>
                            <input type="number" class="form-control" id="inp-prenom" name="dejaengagercp" value="{{ old('dejaengagercp')}}" placeholder="CP"><span style='color:red;'> @error('dejaengagercp'){{ $message}}@enderror</span>
                            <input type="number" class="form-control" id="inp-prenom" name="dejaengagerce" value="{{ old('dejaengagerce')}}" placeholder="CE">
                            <span style='color:red;'> @error('dejaengagerce'){{ $message}}@enderror</span>
                        </div>

                    </div>
                    <div class="col" style="width: 20%">

                        <input type="submit" class="btn btn-primary impr" value="imprimer">

                    </div>



                </form>
            </div>

        </div>


    </div>
@endsection
