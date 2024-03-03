@extends('layouts.withoutmenu')
@section('content')

    <h1>
        Mes paris
    </h1>

    @if (\Session::has('add'))
        <div class="detailsflex">
            <div class="error" style="background-color: #2ecc71;">
                Votre solde a bien été mis a jour
            </div>
        </div>
    @endif


    @if (\Session::has('delete'))
        <div class="detailsflex">
            <div class="error" style="background-color: #2ecc71;">
                La page paris a été mis a jour
            </div>
        </div>
    @endif

    @if($tab == [])
        <p>
            Vous n'avez actuellement aucun paris
        </p>
    @else
        <div class="bet-container">
            <!-- AFFICHAGE DES PARIS -->
            @foreach($tab as $t)
                <div class="bet">
                    <div class="flex">
                        <img src="{{$t['crestHome']}}" alt="">
                        {{$t['homeTeam']}} vs {{$t['awayTeam']}}
                        <img src="{{$t['crestAway']}}" alt="">
                    </div>
                    <span style="display: flex; align-items: center; gap: 15px;"><h1 class="bet-title">{{$t['mise']}} €</h1> sur <h2>{{$t['team_name']}}</h2>coté a <b>{{$t['odds']}}</b></span>
                    Gains possibles : <b>{{$t['possibleWinBet']}} €</b> <br>

                    <!-- POUR RECUPERER LES BETS SI LE MATCH EST FINI-->
                    @if($t['winner'] ==! NULL)
                        @if($t['winner'] == $t['result_user'] && $t['status'] == "FINISHED")
                            <a href="{{route('reward', ['id' => $t['id_paris']])}}">
                                <p style="background: green; width: max-content; color: white; padding: 10px 25px">
                                    Vous avez gagné votre pari !
                                </p>
                            </a>
                        @elseif($t['status'] == "FINISHED")
                            <a href="{{route('reward', ['id' => $t['id_paris']])}}">
                                <p style="background: red; width: max-content; color: white; padding: 10px 25px">
                                    Vous avez perdu votre pari !
                                </p>
                            </a>
                        @else
                            <p style="background: gray; width: max-content; color: white; padding: 10px 25px">
                                Le match n'est pas fini..
                            </p>
                        @endif
                    @else
                        <p style="background: gray; width: max-content; color: white; padding: 10px 25px">
                            Le match n'est pas fini..
                        </p>
                    @endif
                </div>

            @endforeach
        </div>

    @endif

@endsection
