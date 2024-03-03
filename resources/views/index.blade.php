@extends('layouts.app')
@section('content')


<h1 style="text-align: center">
    {{$matches->competition->name}}
</h1>

@if($id == 2015 || $id == 2021 || $id == 2019 || $id == 2002 || $id == 2014)

<p class="rankingLinks" style="text-align: center">
    <u style="cursor: pointer">
        Voir le classement
    </u>
</p>

    <div class="ranking">
        <table>
            <tr>
                <th>
                    Position
                </th>
                <th>

                </th>
                <th>
                    Équipe
                </th>
                <th>
                    PTS
                </th>
                <th>
                    V
                </th>
                <th>
                    N
                </th>
                <th>
                    D
                </th>
                <th>
                    BM
                </th>
                <th>
                    BE
                </th>
                <th>
                    DB
                </th>
                <th>
                    Forme
                </th>
            </tr>
            @foreach($ranking as $r)
                <tr>
                    <th class="pos{{$r['position']}} pos">
                        {{$r['position']}}
                    </th>
                    <td>
                        <img src="{{$r['logo']}}" alt="" height="25px" width="25px">
                    </td>
                    <td>
                        <a href="{{route('team', ['id' => $r['id']])}}">
                            {{$r['name']}}
                        </a>
                    </td>
                    <td class="pos{{$r['position']}} pos">
                        {{$r['PTS']}}
                    </td>
                    <td>
                        {{$r['V']}}
                    </td>
                    <td>
                        {{$r['N']}}
                    </td>
                    <td>
                        {{$r['D']}}
                    </td>
                    <td>
                        {{$r['BM']}}
                    </td>
                    <td>
                        {{$r['BE']}}
                    </td>
                    <td>
                        {{$r['DB']}}
                    </td>
                    <th class = "forme">
                        @if($r['form1'] == "V")
                            <div class="win">
                                {{$r['form1']}}
                            </div>
                        @elseif($r['form1'] == "N")
                            <div class="draw">
                                {{$r['form1']}}
                            </div>
                        @elseif($r['form1'] == "D")
                            <div class="lost">
                                {{$r['form1']}}
                            </div>
                        @endif

                        @if($r['form2'] == "V")
                            <div class="win">
                                {{$r['form2']}}
                            </div>
                        @elseif($r['form2'] == "N")
                            <div class="draw">
                                {{$r['form2']}}
                            </div>
                        @elseif($r['form2'] == "D")
                            <div class="lost">
                                {{$r['form2']}}
                            </div>
                        @endif

                        @if($r['form3'] == "V")
                            <div class="win">
                                {{$r['form3']}}
                            </div>
                        @elseif($r['form3'] == "N")
                            <div class="draw">
                                {{$r['form3']}}
                            </div>
                        @elseif($r['form3'] == "D")
                            <div class="lost">
                                {{$r['form3']}}
                            </div>
                        @endif

                        @if($r['form4'] == "V")
                            <div class="win">
                                {{$r['form4']}}
                            </div>
                        @elseif($r['form4'] == "N")
                            <div class="draw">
                                {{$r['form4']}}
                            </div>
                        @elseif($r['form4'] == "D")
                            <div class="lost">
                                {{$r['form4']}}
                            </div>
                        @endif

                        @if($r['form5'] == "V")
                            <div class="win">
                                {{$r['form5']}}
                            </div>
                        @elseif($r['form5'] == "N")
                            <div class="draw">
                                {{$r['form5']}}
                            </div>
                        @elseif($r['form5'] == "D")
                            <div class="lost">
                                {{$r['form5']}}
                            </div>
                        @endif
                    </th>
                </tr>
            @endforeach
        </table>
    </div>
@endif




<h1 style="text-align: center">
    Les matchs
</h1>

<div class="matches">
    @foreach($matches->matches as $m)
        @if(isset($m->odds->homeWin))
            <div class="match">
                <a href="{{ route('match', ['id' => $m->id]) }}">
                    <div class="team">
                        {{$m->homeTeam->name}} VS {{$m->awayTeam->name}}
                    </div>
                    <div class="horaires"> {{$m->utcDate}} </div>
                    <div class="scores">
                        <img src="{{$m->homeTeam->crest}}" height="25px" width="25px" alt="">
                        <div class="result"> {{$m->score->halfTime->home}} - {{$m->score->halfTime->away}} </div>
                        <img src="{{$m->awayTeam->crest}}" height="25px" width="25px" alt="">
                    </div>
                    <div class="cotes">
                        {{$m->odds->homeWin}} | {{$m->odds->draw}} | {{$m->odds->awayWin}}
                    </div>
                </a>
            </div>
        @else
        @endif
    @endforeach
</div>

@endsection

@if($id == 2015)
    <style>
        .pos{
            border-radius: 5px;
        }
        .pos1,.pos2{
            background: #06193B;
            color: white;
        }
        .pos3{
            background: #435469;
            color: white;
        }
        .pos4{
            background: #CD853F;
            color: white;
        }
        .pos5{
            background: green;
            color: white;
        }
        .pos18,.pos19,.pos20, .pos17{
            background: darkred;
            color: white;
        }

    </style>
@endif

@if($id == 2021 || $id == 2014 || $id == 2019)
    <style>
        .pos{
            border-radius: 5px;
        }
        .pos1,.pos2,.pos3,.pos4{
            background: #06193B;
            color: white;
        }
        .pos5{
            background: #CD853F;
            color: white;
        }
        .pos6{
            background: green;
            color: white;
        }
        .pos18,.pos19,.pos20{
            background: darkred;
            color: white;
        }

    </style>
@endif

@if($id == 2002)
    <style>
        .pos{
            border-radius: 5px;
        }
        .pos1,.pos2,.pos3,.pos4{
            background: #06193B;
            color: white;
        }
        .pos5{
            background: #CD853F;
            color: white;
        }
        .pos6{
            background: green;
            color: white;
        }
        .pos18,.pos17,.pos16{
            background: darkred;
            color: white;
        }

    </style>
@endif

<style>
    tr td a{
        text-decoration: none;
        color: black;
    }

    tr td{
        text-align: center;
    }

    tr .forme{
        display: flex;
        width: max-content;
        margin: 0 auto;
        gap: 5px;
    }

    tr .forme .win{
        background: green;
        width: 20px;
        height: 20px;
        color: white;
    }

    tr .forme .lost{
        background: red;
        width: 20px;
        height: 20px;
        color: white;
    }

    tr .forme .draw{
        background: orange;
        width: 20px;
        height: 20px;
        color: white;
    }
</style>

