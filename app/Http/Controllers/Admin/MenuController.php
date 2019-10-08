<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

use App\Entities\User;
use App\Entities\Menu;
use App\Report;

use App\Helpers\UserHelper;
use App\Helpers\RouteHelper;

class MenuController extends BaseController
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
            $menu = Menu::all();

            return view('admin.pages.index',[
                "user" => $this->userHelper->getLoggedUser($request),
                "title" => $this->appTitle,
                "menu" => $menu,
                "routeName" => $this->routeName,
            ]);
        }else{
            return $this->routeHelper->redirectToLogin();
        }
    }
}
