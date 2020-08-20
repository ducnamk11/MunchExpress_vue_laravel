<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($id)
    {
        $resto = Restaurant::find($id);
        if (!$resto) {
            abort(404, 'this restauran is not valid !');
        }

        $orders = Order::where('resto_id', $id)->orderBy('isComplete')->paginate(20);

        return view('order.index')
            ->with('orders', $orders)
            ->with('resto', $resto);
    }

    public function add($id)
    {
        $resto = Restaurant::findOrFail($id);
        return view('order.add')->with('resto', $resto);
    }
    public function save(Request $request)
    {
        return $request->all();

    }
}
