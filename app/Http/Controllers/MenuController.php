<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\Models\Menu;
use App\Rules\RestoCategoryValidate;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function store(Request $request)
    {
        $postData = $this->validate($request, [
            'category' => ['required', new RestoCategoryValidate(request('restoId'))],
            'restoId' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
            'item' => 'required',
        ]);
        $category = Category::where('resto_id', $postData['restoId'])->where('name', $postData['category'])->first();
        $menu = Menu::create([
            'name' => $postData['item'],
            'price' => $postData['price'],
            'description' => $postData['description'],
            'resto_id' => $postData['restoId'],
            'category_id' => $category->id,
        ]);
        return response()->json($menu, 201);
    }
}

//
//
//$postData = $this->validate($request, [
//    'restoId' => 'required|numberic',
//    'price' => 'required|numberic',
//    'item' => 'required',
//    'category' => ['required', new RestoCategoryValidate(request('restoId'))],
//]);
//$category = Category::where('resto_id', $postData['restoId'])->where('name', $postData['category'])->first();
//$menu = Menu::create([
//    'name' => $postData['item'],
//    'price' => $postData['price'],
//    'description' => '',
//    'resto_id' => $postData['restoId'],
//    'category_id' => $category->id,
//]);
//return response()->json($menu, 201);
