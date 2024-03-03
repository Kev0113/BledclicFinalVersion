<?php

namespace App\Http\Controllers;

use App\Models\Paries;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function competition($id){
        $matches = $this->getApi("http://api.football-data.org/v4/competitions/$id/matches?status=SCHEDULED");

        $url = "http://api.football-data.org/v4/competitions/$id/standings";
        $rank = $this->getApi($url);

        $nbEquipe = count($rank->standings[0]->table);


        if ($id == 2015 || $id == 2021 || $id == 2019 || $id == 2002 || $id == 2014){
                for ($i = 0 ; $i <= $nbEquipe - 1 ; $i++){
                    $form1 = substr($rank->standings[0]->table[$i]->form, -9, 1);
                    $form2 = substr($rank->standings[0]->table[$i]->form, -7, 1);
                    $form3 = substr($rank->standings[0]->table[$i]->form, -5, 1);
                    $form4 = substr($rank->standings[0]->table[$i]->form, -3, 1);
                    $form5 = substr($rank->standings[0]->table[$i]->form, -1);
                        if($form1 == "W"){
                            $form1 = "V";
                        }elseif($form1 == "D"){
                            $form1 = "N";
                        }elseif ($form1 == "L"){
                            $form1 = "D";
                        }

                        if($form2 == "W"){
                            $form2 = "V";
                        }elseif($form2 == "D"){
                            $form2 = "N";
                        }elseif ($form2 == "L"){
                            $form2 = "D";
                        }

                        if($form3 == "W"){
                            $form3 = "V";
                        }elseif($form3 == "D"){
                            $form3 = "N";
                        }elseif ($form3 == "L"){
                            $form3 = "D";
                        }

                        if($form4 == "W"){
                            $form4 = "V";
                        }elseif($form4 == "D"){
                            $form4 = "N";
                        }elseif ($form4 == "L"){
                            $form4 = "D";
                        }

                        if($form5 == "W"){
                            $form5 = "V";
                        }elseif($form5 == "D"){
                            $form5 = "N";
                        }elseif ($form5 == "L"){
                            $form5 = "D";
                        }

                    $ranking[] = [
                        "position" => $rank->standings[0]->table[$i]->position,
                        "name" => $rank->standings[0]->table[$i]->team->name,
                        "logo" => $rank->standings[0]->table[$i]->team->crest,
                        "MJ" => $rank->standings[0]->table[$i]->playedGames,
                        "V" => $rank->standings[0]->table[$i]->won,
                        "N" => $rank->standings[0]->table[$i]->draw,
                        "D" => $rank->standings[0]->table[$i]->lost,
                        "PTS" => $rank->standings[0]->table[$i]->points,
                        "BM" => $rank->standings[0]->table[$i]->goalsFor,
                        "BE" => $rank->standings[0]->table[$i]->goalsAgainst,
                        "DB" => $rank->standings[0]->table[$i]->goalDifference,
                        "form" => $rank->standings[0]->table[$i]->form,
                        "form1" => $form1,
                        "form2" => $form2,
                        "form3" => $form3,
                        "form4" => $form4,
                        "form5" => $form5,
                        "id" => $rank->standings[0]->table[$i]->team->id
                    ];
                }
            }else{
                $ranking[] = [];
            }

        return view('index', ["matches" => $matches, "ranking" => $ranking, "id" => $id]);
    }

    public function Match($id){
        $url = 'http://api.football-data.org/v4/matches/'.$id;
        $match = $this->getApi($url);

        if ($match->status == "FINISHED"){
            return redirect("/previous/$match->id");
        }else{
            return view('matchs.details', ["match" => $match, 'matchId' => $id]);
        }
    }

    public function rank(){
        $user_rank = User::orderByRaw('money DESC')->get();
        return view('rank.rank', ['user_rank' => $user_rank]);
    }

    public function paris(){
        $paris_byUser = Paries::where('user_id', Auth::id())->get();
        $tab = [];

            foreach ($paris_byUser as $p) {
                $url = 'http://api.football-data.org/v4/matches/' . $p->match_id;
                $match = $this->getApi($url);

                if($p->betteam_id == "HOME_TEAM"){
                    $result = $match->homeTeam->name;
                }elseif ($p->betteam_id == "AWAY_TEAM"){
                    $result = $match->awayTeam->name;
                }elseif ($p->betteam_id == "DRAW"){
                    $result = "le match nul";
                }

                $tab[] = [
                    'id_paris' => $p->id,
                    'homeTeam' => $match->homeTeam->name,
                    'awayTeam' => $match->awayTeam->name,
                    'mise' => $p->price,
                    'result_user' => $p->betteam_id,
                    'team_name' => $result,
                    'odds' => $p->odds,
                    'possibleWinBet' => $p->odds*$p->price,
                    'winner' => $match->score->winner,
                    'status' => $match->status,
                    'crestHome' => $match->homeTeam->crest,
                    'crestAway' => $match->awayTeam->crest,
                ];
            }


        $match = 0;
        return view('paris.paris', ['paris_byUser' => $match, 'tab' => $tab]);
    }

    public function parier(Request $request){
        $url = 'http://api.football-data.org/v4/matches/'.$_POST["matchId"];
        $match = $this->getApi($url);

        if($_POST['teamId'] == "NULL" || $_POST['teamId'] == "HOME_TEAM" || $_POST['teamId'] == "AWAY_TEAM" || $_POST['teamId'] == "DRAW"){
            if($_POST['odds'] == $match->odds->homeWin || $_POST['odds'] == $match->odds->awayWin || $_POST['odds'] == $match->odds->draw){
                if(Auth::user()->money >= $_POST["montant"]){
                    $paries = new Paries();
                    $paries->user_id = Auth::id();
                    $paries->match_id = $_POST["matchId"];
                    $paries->betteam_id = $_POST["teamId"];
                    $paries->price = $_POST["montant"];
                    $paries->odds = $_POST["odds"];
                    $paries->save();

                    $newSolde = Auth::user()->money - $_POST["montant"];

                    User::where('id', Auth::id())->update(['money' => $newSolde]);
                    $message = "Votre pari a bien été pris en compte";
                    return redirect()->back()->with('success', 'Votre pari a bien été pris en compte');


                }else{
                    $message = "Solde insuffisant";
                    return view('matchs.details', ["match" => $match, "matchId" => $_POST["matchId"], "message" => $message]);
                }
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }

    }

    public function reward($id){
        $reward = Paries::findOrFail($id);

        $url = 'http://api.football-data.org/v4/matches/'.$reward->match_id;
        $match = $this->getApi($url);

        if($match->score->winner == $reward->betteam_id){
            $bet = $reward->price*$reward->odds;
            $newSolde = Auth::user()->money + $bet;
            User::where('id', Auth::id())->update(['money' => $newSolde]);
            $reward->delete();
            return redirect()->back()->with('add', 'Votre solde été mis a jour');
        }else{
            $reward->delete();
            return redirect()->back()->with('delete', 'Votre pari a bien été supprimé');
        }
    }

    public function team($id){
        $url = 'http://api.football-data.org/v4/teams/'.$id;
        $team = $this->getApi($url);

        $url2 = "http://api.football-data.org/v4/teams/$id/matches/";
        $match = $this->getApi($url2);

        //var_dump($team->name);
        //var_dump($match->awayTeam);

        return view('team.team', ["team" => $team, "match" => $match]);
    }

    public function previous($id){
        $url = "http://api.football-data.org/v4/matches/$id";
        $previous = $this->getApi($url);

        return view('matchs.previous', ["previous" => $previous]);
    }

    public function player($id){
        $url = "http://api.football-data.org/v4/persons/$id";
        $previous = $this->getApi($url);

        var_dump($previous);

        return view('players.players', ["previous" => $previous]);
    }

    public function getApi($url){
        $uri = $url;
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token: c0c8dfb02c64492e9904646c32a046c9';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        $matches = json_decode($response);
        return $matches;
    }
}
