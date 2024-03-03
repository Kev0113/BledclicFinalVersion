@extends('layouts.withoutheader')
@section('content')


    @if(isset($message))
        <div class="detailsflex">
            <div class="error">
                {{$message}}
            </div>
        </div>
    @endif

    @if (\Session::has('success'))
        <div class="detailsflex">
            <div class="error" style="background-color: #2ecc71;">
                {!! \Session::get('success') !!}
            </div>
        </div>
    @endif


    <div class="matchnoid">

        @if(Auth::check())
            <div class="gridparis">
                <button class="bet1"> {{$match->homeTeam->name}} <br> {{$match->odds->homeWin}}</button>
                @endif

                <div class="match match-bet">
                    <div class="team">
                        {{$match->homeTeam->name}} VS {{$match->awayTeam->name}}
                    </div>
                    <div class="horaires"> {{$match->utcDate}} </div>
                    <div class="scores">
                        <a href="{{route('team', ['id' => $match->homeTeam->id])}}">
                            <img src="{{$match->homeTeam->crest}}" height="25px" width="25px" alt="">
                        </a>
                        <div class="result"> {{$match->score->halfTime->home}} - {{$match->score->halfTime->away}} </div>
                        <a href="{{route('team', ['id' => $match->awayTeam->id])}}">
                            <img src="{{$match->awayTeam->crest}}" height="25px" width="25px" alt="">
                        </a>
                    </div>
                    <div class="cotes"> Cotes : {{$match->odds->homeWin}}| {{$match->odds->draw}} | {{$match->odds->awayWin}} </div>
                    </a>
                </div>

                @if(Auth::check())
                    <button class="bet3"> Nul <br> {{$match->odds->draw}}</button>

                    <button class="bet2"> {{$match->awayTeam->name}} <br> {{$match->odds->awayWin}}</button>

                    <div class="betModal">
                        <div class="window">
                            <i class='bx bx-plus'></i>
                            <form action="{{route('parier')}}" method="post">
                                @csrf
                                <input type="hidden" name="matchId" value="{{$matchId}}">
                                <input type="hidden" name="teamId" value="" id="teamId">
                                <input type="hidden" name="odds" value="" id="teamOdds">
                                <input type="number" name="montant" placeholder="montant">
                                <button type="submit" class="submit">Parier</button>
                            </form>
                        </div>
                    </div>
                @endif


            </div>

            <script>
                document.querySelector('.bet1').addEventListener('click', function(){
                    document.querySelector(".betModal").classList.add('flexAppear');
                    document.querySelector('#teamId').value = "HOME_TEAM"
                    document.querySelector('#teamOdds').value = "{{$match->odds->homeWin}}"
                });
                document.addEventListener('click', function(e){
                    if(e.target.classList[0] == "betModal" || e.target.classList[1] == "bx-plus"){
                        document.querySelector(".betModal").classList.remove('flexAppear');
                    }
                });


                document.querySelector('.bet3').addEventListener('click', function(){
                    document.querySelector(".betModal").classList.add('flexAppear');
                    document.querySelector('#teamId').value = "DRAW"
                    document.querySelector('#teamOdds').value = "{{$match->odds->draw}}"
                });
                document.addEventListener('click', function(e){
                    if(e.target.classList[0] == "betModal" || e.target.classList[1] == "bx-plus"){
                        document.querySelector(".betModal").classList.remove('flexAppear');
                    }
                });


                document.querySelector('.bet2').addEventListener('click', function(){
                    document.querySelector(".betModal").classList.add('flexAppear');
                    document.querySelector('#teamId').value = "AWAY_TEAM"
                    document.querySelector('#teamOdds').value = "{{$match->odds->awayWin}}"
                });
                document.addEventListener('click', function(e){
                    if(e.target.classList[0] == "betModal" || e.target.classList[1] == "bx-plus"){
                        document.querySelector(".betModal").classList.remove('flexAppear');
                    }
                });
            </script>

        </div>

            </body>
            </html>

@endsection

