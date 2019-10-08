<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use App\Entities\User;

class RouteHelper
{
    public function redirectToLogin(){
        return redirect()->action('Admin\IndexController@loginPage')->withCookie(cookie('user', "", 0))->withCookie(cookie('token', "", 0));
    }

}
