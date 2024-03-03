@extends('layouts.withoutmenu')
@section('content')

    <div class="team_banner" style="display: block;">
        <div class="content" style="display: flex; align-items: center; justify-content: center">
            <div class="team_img">
                <img src="{{$previous->homeTeam->crest}}" alt="">
            </div>
            <div class="team_info">
                <p style="text-align: center; margin: 0">
                    {{$previous->competition->name}}
                    {{$previous->venue}}
                </p>
                <h1>
                    {{$previous->homeTeam->name}} {{$previous->score->fullTime->home}}
                    -
                    {{$previous->score->fullTime->away}} {{$previous->awayTeam->name}}
                </h1>
                <p style="text-align: center">
                    (Mi-temps :  {{$previous->score->halfTime->home}}
                    -
                    {{$previous->score->halfTime->away}})
                </p>
            </div>
            <div class="team_img">
                <img src="{{$previous->awayTeam->crest}}" alt="">
            </div>
        </div>
    </div>

@endsection
