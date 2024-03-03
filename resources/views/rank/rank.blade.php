@extends('layouts.withoutmenu')
@section('content')


    <ol>
        @foreach($user_rank as $r)
            <li>
                <div class="contenuli">
                    <img src="{{$r->avatar}}" height="100px" width="100px" alt="avatar">
                    <p>{{$r->name}}</p>
                    <p>{{$r->money}} €</p>
                </div>
            </li>
        @endforeach
    </ol>


@endsection
