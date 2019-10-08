<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

use App\Entities\User;
use App\Report;

use App\Helpers\UserHelper;
use App\Helpers\RouteHelper;

class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Request $request, UserHelper $userHelper, RouteHelper $routeHelper)
    {
        $this->appTitle = env('APP_NAME');
        $this->routeName = Route::currentRouteName();
        $this->userHelper = $userHelper;
        $this->routeHelper = $routeHelper;
    }

    public function index(Request $request)
    {
        $auth = $this->userHelper->checkAuth($request);
        if($auth == true){
            return view('admin.pages.index',[
                "user" => $this->userHelper->getLoggedUser($request),
                "title" => $this->appTitle,
                "routeName" => Route::currentRouteName(),
            ]);
        }else{
            return $this->routeHelper->redirectToLogin();
        }
    }

    public function loginPage(Request $request){
        return view('admin.pages.login',["title" => $this->appTitle,"hideMenu" => true]);
    }

    public function login(Request $request){
        $minutes = 120;
        if($request->filled(["password","login"])){
            $user = User::where("login",$request->login)->first();
            if($user != null){
                if(password_verify($request->password,$user->password)){
                    $last_login = date("Y-m-d H:i:s");
                    $user->token = md5($last_login);
                    $user->save();
                    return redirect()->action('Admin\IndexController@index')->withCookie(cookie('user', $user->login, $minutes))->withCookie(cookie('token', $user->token, $minutes));
//                    return response()->json(new Report("200",$user,"Успешная авторизация!"))->withCookie(cookie('user', $user->login, $minutes))->withCookie(cookie('token', $user->token, $minutes));
                }
            }
        }
        return back()->withInput()->with("notification","Некорректная авторизация!")->with("notificationStatus","danger");
//        return response()->json(new Report("Error",null,"Некорректная авторизация!"));
    }

    public function logout(Request $request){
        return redirect()->action('Admin\IndexController@index')->withCookie(cookie('user', "", 0))->withCookie(cookie('token', "", 0));
    }

    private function checkAuth(Request $request){
        $login = $request->cookie('user');
        $token = $request->cookie('token');
        if($login != null && $token != null){
            $user = User::where("login",$login)->first();
            if($token == $user->token){
                return true;
            }
        }
        return false;
    }

}
