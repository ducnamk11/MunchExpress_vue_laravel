<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use App\Services\RestoService;

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
    public function index(MenuService $service, RestoService $restoService)
    {
        $restoId = 1;
        $restos = $restoService->userRestoAndTables();
        $categories = $service->getMenuWithCategory($restoId);
        return view('home', compact('categories','restoId','restos'));
    }
}
