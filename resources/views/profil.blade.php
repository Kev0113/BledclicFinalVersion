@extends('layouts.withoutmenu')
@section('content')


    <section class="profil">


    <div class="pfgauche">
        <div class="profil__avatar">
            <img src="{{Auth::user()->avatar}}" height="150px" width="150px" alt="">
            <h1>{{Auth::user()->name}}</h1>
            <p> {{Auth::user()->email}} </p>
        </div>
        <div class="profil__gerer ">
            <div class="changeav">
                <p onclick="change_avatar()">
                    <u> Changer d'avatar </u>
                </p>

                <div class="changeAvatar__form" style="display: none">
                    <form action="{{route('deleteAccount')}}" method="POST">
                        @csrf
                        <input type="text" name="change_avatar" required placeholder="Changer avatar">
                        <input type="submit" value="CONFIRMER">
                    </form>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>


            <div class="delac">
                <p onclick="verif_password()">
                    <u> Fermer mon compte </u>
                </p>

                <div class="deleteAccount__form" style="display: none">
                    <form action="{{route('deleteAccount')}}" method="POST">
                        @csrf
                        <input type="password" name="verif_password" required placeholder="Votre mot de passe">
                        <input type="submit" value="CONFIRMER">
                    </form>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>


</section>

@endsection
