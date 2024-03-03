<link rel="stylesheet" href="<?php echo asset('../css/style.css')?>" type="text/css">
<title>Bledclic</title>




<div class="bande">
    <p class="loop"> Jouer comporte des risques : endettement, isolement, dépendance. Pour être aidé, appelez le 09-74-75-13-13 (appel non surtaxé) </p>
</div>

<header class="bglogin">

    <div class="nom">
        <h1>BledClic</h1>
        <h4><a href="{{route('index')}}">Back home</a></h4>
    </div>



    <div class="login">
        <h1> Login </h1>

        <form action="{{route('login')}}" method="POST">
            @csrf

            <input type="email" name="email" required placeholder="Email">
            <input type="password" name="password" required placeholder="Mot de passe">

            <input class="submit" type="submit">
        </form>


        <div class="register">
            Pas encore de compte ? <a href='{{route("register")}}'>Inscrivez vous</a>
        </div>

    </div>


</header>
