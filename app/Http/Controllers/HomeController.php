<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\Models\Menu;
use App\Services\MenuService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MenuService $service)
    {
        $restoId = 1;
        $categories = $service->getMenuWithCategory($restoId);
        return view('home', compact('categories','restoId'));
    }
}
