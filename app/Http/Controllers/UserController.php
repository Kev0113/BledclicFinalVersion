<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function editProfil(Request $request){
        $request->validate([
            'verif_password' => "min:8 | max:50",
            'change_avatar' => "string",
        ]);

        if($request->input('verif_password') == ! NULL ){
            $password= $request->input('verif_password');

            if(password_verify($password, Auth::user()->password)){
                Auth::user()->delete();
                return redirect('/');
            }else{
                return redirect('/profil');
            }
        }

        if($request->input('change_avatar') == ! NULL ){
            $change_avatar = User::findOrFail(Auth::id());
            $change_avatar->avatar = $request->input('change_avatar');
            $change_avatar->save();

            return redirect('/profil');
        }
    }
}
