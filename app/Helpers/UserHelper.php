<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use App\Entities\User;

class UserHelper
{
    private $user = null;

    public function getLoggedUser(Request $request = null){
        if($request !== null){
            if($this->user == null){
                $login = $request->cookie('user');
                $token = $request->cookie('token');
                if($login != null && $token != null){
                    error_log("login: ".$login);
                    error_log("token: ".$token);
                    $user = User::where("login",$login)->first();
                    if($user !== null && $token == $user->token){
                        return $user;
                    }
                }
            }else{
                return $this->user;
            }
        }
        return false;
    }

}
