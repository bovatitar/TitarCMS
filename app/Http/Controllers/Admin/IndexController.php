<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->appTitle = env('APP_NAME');
    }

    public function index(Request $request)
    {
        $auth = $this->checkAuth($request);
        if($auth == true){
            return redirect()->action('Admin\IndexController@dashboard');
        }else{
            return redirect()->action('Admin\IndexController@loginPage');
        }
    }

    public function loginPage(Request $request){
        return view('admin.pages.login',["title" => $this->appTitle,"hideMenu" => true]);
    }

    public function login(Request $request){
        $minutes = 120;
        if($request->filled(["password","login"])){
            $user = \App\User::where("login",$request->login)->first();
            if($user != null){
                if(password_verify($request->password,$user->password)){
                    $last_login = date("Y-m-d H:i:s");
                    $user->token = md5($last_login);
                    $user->save();
                    return response()->json(new \App\Report("200",$user,"Успешная авторизация!"))->withCookie(cookie('user', $user->login, $minutes))->withCookie(cookie('token', $user->token, $minutes));
                }
            }
        }
        return response()->json(new \App\Report("Error",null,"Некорректная авторизация!"));
    }

    public function logout(Request $request){
        return response()->json(new \App\Report("200",true,"Успешный выход!"))->withCookie(cookie('user', "", 0))->withCookie(cookie('token', "", 0));
    }

    private function checkAuth(Request $request){
        $login = $request->cookie('user');
        $token = $request->cookie('token');
        if($login != null && $token != null){
            $user = \App\User::where("login",$login)->first();
            if($token == $user->token){
                return true;
            }
        }
        return false;
    }

}
