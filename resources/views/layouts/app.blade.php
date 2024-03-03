<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo asset('../css/style.css')?>" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="/js/app.js" defer></script>


    <title>Bledclic</title>
</head>



<div class="bande">
    <p class="loop"> Jouer comporte des risques : endettement, isolement, dépendance. Pour être aidé, appelez le 09-74-75-13-13 (appel non surtaxé) </p>
</div>


<div class="navmenu">
    <a href="{{route('index')}}">Home</a>
    <a href="{{route('rank')}}"><i class='bx bx-trophy'></i> Classement </a>
    @if(Auth::check())
        <div class="connected">
            <a href="{{route('paris')}}"><i class='bx bx-calendar-week' ></i> Mes paris</a>
            <p> <i class='bx bx-wallet'></i> {{Auth::user()->money}} €</p>
            <a href="{{route('profil')}}"> {{Auth::user()->name}} </a>
            <a href="{{route('logout')}}" onclick="document.getElementById('logout').submit(); return false;" >Logout
                <form id="logout" action="{{route('logout')}}" method="POST">
                    @csrf
                </form> </a>
        </div>
    @else
        <div class="connect">
            <a href='{{route("login")}}'>Connexion</a>
            <a href='{{route("register")}}'>S'inscrire</a>
        </div>
    @endif
</div>






<header>


    <button class="burger-button" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
        <svg width="100" height="100" viewBox="0 0 100 100">
            <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
            <path class="line line2" d="M 20,50 H 80" />
            <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
        </svg>
    </button>

    <div class="burger-menu">

        <h1 class="burger-title">BledClic</h1>

        <div class="grid">
            <a href="{{route('index')}}" class="nav-links">
                <i class='bx bx-home-circle'></i>
                Accueil
            </a>
            <a href="{{route('rank')}}" class="nav-links">
                <i class='bx bx-trophy'></i>
                Classement
            </a>
            @if(Auth::check())
                <a href="{{route('paris')}}" class="nav-links">
                    <i class='bx bx-calendar-week'></i> Mes paris
                </a>
                <a href="#" class="nav-links">
                    <i class='bx bx-wallet'></i> {{Auth::user()->money}} €
                </a>
                <a href="{{route('profil')}}" class="nav-links">
                    <i class='bx bx-user' ></i> {{Auth::user()->name}}
                </a>
                <a href="{{route('logout')}}" class="logout">
                    Déconnexion
                </a>
            @else
                <a href="{{route('login')}}" class="nav-links">
                    <i class='bx bx-user'></i>
                    Connexion
                </a>
                <a href="{{route('register')}}" class="nav-links">
                    <i class='bx bxs-user-plus'></i>
                    Inscription
                </a>
            @endif

        </div>

    </div>

    {{-- <div class="container">
        <div id="wrap">
            <div class="menu">

                <nav class="nav">
                    <a href="#wrap" id="open">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="34px" height="27px" viewbox="0 0 34 27" enable-background="new 0 0 34 27" xml:space="preserve">
            <rect fill="#FFFFFF" width="34" height="4"/>
                            <rect y="11" fill="#FFFFFF" width="34" height="4"/>
                            <rect y="23" fill="#FFFFFF" width="34" height="4"/>
            </svg>
                    </a>


                    <a href="#" id="close">X</a>
                    <div class="bgmenu">
                        <a href="{{route('ChooseCompe', ['id'=> 2015])}}">Ligue 1</a>
                        <a href="{{route('ChooseCompe', ['id'=> 2001])}}">Ligue des champions</a>
                        <a href="{{route('ChooseCompe', ['id'=> 2021])}}">Premier League</a>
                    </div>
                </nav>
            </div>
        </div> --}}



    <div class="nom">
        <h1>BledClic</h1>
        <h2>Fan de foot ? Venez mettre vos connaissances à profit
            et parier entre copains!
        </h2>
    </div>
    </div>

</header>






<body>
<nav class="menunonresponsive">
    <div class="scdtitle">
        Compétitions
    </div>
    <div class="compet">
        <a href="{{route('ChooseCompe', ['id'=> 2001])}}">
            <img src="{{ URL::to('/img/championsleague.jpg') }}" alt="ligue des champions"> </a>
        <a href="{{route('ChooseCompe', ['id'=> 2015])}}">
            <img src="{{ URL::to('/img/ligue1.png') }}" alt="ligue 1"> </a>
        <a href="{{route('ChooseCompe', ['id'=> 2021])}}">
            <img src="{{ URL::to('/img/premierleague.jpg') }}" alt="premier league"> </a>
        <a href="{{route('ChooseCompe', ['id'=> 2019])}}">
            <img src="{{ URL::to('/img/seriea.jpg') }}" alt="série a"> </a>
        <a href="{{route('ChooseCompe', ['id'=> 2002])}}">
            <img src="{{ URL::to('/img/bundesliga.png') }}" alt="bundesliga"> </a>
        <a href="{{route('ChooseCompe', ['id'=> 2014])}}">
            <img src="{{ URL::to('/img/liga.png') }}" alt="la liga"> </a>
    </div>
</nav>

@yield('content')


    <footer class="footer">
        <div class="grid-footer">
            <div class="footer-container">
                <h1>Bledclic</h1>
                <ul>
                    <a href="/">
                        <li>Accueil</li>
                    </a>
                    <a href="{{route('rank')}}">
                        <li>Classement</li>
                    </a>
                    <a href="{{route('login')}}">
                        <li>Connexion</li>
                    </a>
                    <a href="{{route('register')}}">
                        <li>Inscription</li>
                    </a>
                </ul>
            </div>
            <div class="footer-container">
                <h1>Liens utiles</h1>
                <ul>
                    <a href="/">
                        <li>Contact</li>
                    </a>
                    <a href="{{route('rank')}}">
                        <li>Mentions légales</li>
                    </a>
                    <a href="{{route('login')}}">
                        <li>Conditions</li>
                    </a>
                </ul>
            </div>
            <div class="footer-container">
                <h1>Nous contacter</h1>
                <ul>
                    <a href="/">
                        <li><i class='bx bxl-facebook-circle'></i> Facebook</li>
                    </a>
                    <a href="{{route('rank')}}">
                        <li><i class='bx bxl-twitter' ></i> Twitter</li>
                    </a>
                    <a href="{{route('login')}}">
                        <li><i class='bx bxl-instagram-alt' ></i> Instagram</li>
                    </a>
                    <a href="{{route('register')}}">
                        <li><i class='bx bxl-tiktok' ></i> Tiktok</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="mentions">
            Conditions générales de vente
            Vos informations personnelles
            Cookies
            Annonces basées sur vos centres d’intérêt
            © 1996-2023, Amazon.com Inc. ou ses affiliés
        </div>
    </footer>

</body>
</html>

<body>

