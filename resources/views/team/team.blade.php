@extends('layouts.withoutmenu')
@section('content')

    <div class="team_banner">
        <div class="team_img">
            <img src="{{$team->crest}}" alt="">
        </div>
        <div class="team_info">
                <h1>
                    {{$team->name}}
                </h1>
                <p>
                    Entraineur : {{$team->coach->name}}
                </p>
        </div>
    </div>

    <div class="team_flex">
        <div class="team_squad">
            <div class="squad_goal">
                <h1>
                    Gardiens
                </h1>
                @foreach($team->squad as $t)
                    @if($t->position == "Goalkeeper")
                        {{$t->name}} <br>
                    @endif
                @endforeach
            </div>
            <div class="squad_defense">
                <h1>
                    Défenses
                </h1>
                @foreach($team->squad as $t)
                    @if($t->position == "Defence")
                        {{$t->name}} <br>
                    @endif
                @endforeach
            </div>
            <div class="squad_midle">
                <h1>
                    Milieux
                </h1>
                @foreach($team->squad as $t)
                    @if($t->position == "Midfield")
                        {{$t->name}} <br>
                    @endif
                @endforeach
            </div>
            <div class="squad_offense">
                <h1>
                    Attaquants
                </h1>
                @foreach($team->squad as $t)
                    @if($t->position == "Offence")
                        {{$t->name}} <br>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="team_result">
            <h1>
                Calendrier/Résultats
            </h1>

            <table>
                <tr>
                    <th>
                        Compétition
                    </th>
                    <td>

                    </td>
                    <th>
                        Domicile
                    </th>
                    <th>
                        Score
                    </th>
                    <th>
                        Exterieur
                    </th>
                </tr>
                @foreach($match->matches as $m)
                    <tr>
                        <td style="text-align: center">
                            <a href="{{route('ChooseCompe', ['id' => $m->competition->id])}}">
                                {{$m->competition->code}}
                            </a>
                        </td>
                        <td>
                            <img src="{{$m->homeTeam->crest}} " alt="" height="15px" width="15px">
                        </td>
                        <td style="text-align: center">
                            @if($m->score->fullTime->home > $m->score->fullTime->away)
                                <a href="{{route('team', ['id' => $m->homeTeam->id])}}">
                                    <b>{{$m->homeTeam->name}}</b>
                                </a>
                            @else
                                <a href="{{route('team', ['id' => $m->homeTeam->id])}}">
                                    {{$m->homeTeam->name}}
                                </a>
                            @endif
                        </td>
                        <td style="text-align: center">
                            @if(isset($m->score->fullTime->home))
                                @if($m->score->fullTime->home > $m->score->fullTime->away && $m->homeTeam->name == $team->name)
                                    <a href="{{route('previous', ['id' => $m->id])}}" style="color: green">
                                        {{$m->score->fullTime->home}} - {{$m->score->fullTime->away}}
                                    </a>
                                @elseif($m->score->fullTime->home < $m->score->fullTime->away && $m->homeTeam->name == $team->name)
                                    <a href="{{route('previous', ['id' => $m->id])}}" style="color: red">
                                        {{$m->score->fullTime->home}} - {{$m->score->fullTime->away}}
                                    </a>
                                @elseif($m->score->fullTime->home < $m->score->fullTime->away && $m->awayTeam->name == $team->name)
                                    <a href="{{route('previous', ['id' => $m->id])}}" style="color: green">
                                        {{$m->score->fullTime->home}} - {{$m->score->fullTime->away}}
                                    </a>
                                @elseif($m->score->fullTime->home > $m->score->fullTime->away && $m->awayTeam->name == $team->name)
                                    <a href="{{route('previous', ['id' => $m->id])}}" style="color: red">
                                        {{$m->score->fullTime->home}} - {{$m->score->fullTime->away}}
                                    </a>
                                @else
                                    <a href="{{route('previous', ['id' => $m->id])}}">
                                        {{$m->score->fullTime->home}} - {{$m->score->fullTime->away}}
                                    </a>
                                @endif
                            @else
                                A venir
                            @endif
                        </td>
                        <td style="text-align: center">
                            @if($m->score->fullTime->home < $m->score->fullTime->away)
                                <a href="{{route('team', ['id' => $m->awayTeam->id])}}">
                                    <b>{{$m->awayTeam->name}}</b>
                                </a>
                            @else
                                <a href="{{route('team', ['id' => $m->awayTeam->id])}}">
                                    {{$m->awayTeam->name}}
                                </a>
                            @endif
                        </td>
                        <td>
                            <img src="{{$m->awayTeam->crest}}" alt="" height="15px" width="15px">
                        </td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>

@endsection
