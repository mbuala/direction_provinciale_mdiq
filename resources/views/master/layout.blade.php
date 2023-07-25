<!DOCTYPE html>
<html lang="fr-CA">

<head>
    <script src="https://kit.fontawesome.com/bf65d11a7f.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="utf-8">
    <link href="/css/acc.css" rel="stylesheet">

    yield('title')
</head>
<style type="text/css">
    #navdiv{
        overflow-y: scroll;
        border-bottom: 2px solid black;
height: 60%  ;
width:18%;
position: fixed;
}
</style>
<body style="background-color: whitesmoke;">

    <div class="d-flex flex-column flex-shrink-0 p-3 light" id="menu">
        <div class="log" style="height: 30%">
        <a href="/">
            <img src="{{url('img/im.jpg')}}" class="img-fluid logo">
        </a>
        <p class="acad" style="font-size: 100%; text-align:center; color:;">Académie régionale d'éducation et de formation TANGER-TETOUAN-Al-Hoceima direction provinciale
            de
            M'diq-Fnideq</p>
    </div>
    <div class="lis" style="height: 70%">

    <hr>
    <div id="navdiv">

        <ul class="nav flex-column" >
            <li>
                <a href="/liste_offre" class="nav-link link-dark @yield('offre')">
                    Offres
                </a>
            </li>
            <li>
                <a href="{{ url('/liste_avis') }}" class="nav-link link-dark @yield('avis')" aria-current="page">
                    Avis </a>
            </li>
            <li>
                <a href="/liste_decision" class="nav-link link-dark @yield('decision')">
                    Décision
                </a>
            </li>
            <li>
                <a href="/liste_cps" class="nav-link link-dark @yield('cps')">
                    CPS
                </a>
            </li>
            <li>
                <a href="/liste_reglement" class="nav-link link-dark @yield('reglement')">
                    Réglement
                </a>
            </li>
            <li>
                <a href="/liste_convocation" class="nav-link link-dark @yield('convocation')">
                    Convocations
                </a>
            </li>
            <li>
                <a href="/liste_jury" class="nav-link link-dark @yield('jury')">
                    Jurys
                </a>
            </li>
            <li>
                <a href="/process_verbal" class="nav-link link-dark @yield('pv')">
                    Proces Verbal
                </a>
            </li>
            <li>
                <a href="etat_engagement" class="nav-link link-dark @yield('etat_engagement')">
                    Etat d'engagement
                </a>
            </li>
            @if (Auth::user()->role == "admin")
            <li>
                <a href="utilisateurs" class="nav-link link-dark @yield('uti')">
                    Utilisateurs
                </a>
            </li>
            @endif
            <li>
                <a href="{{ route('logout') }}" class="nav-link link-dark @yield('dec')"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

        <hr>
    </div>
    </div>
    @yield('content')



</body>

</html>
