<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class StoreController extends Controller
{

    public function index()
    {
    	$products = Product::all();
        $cart = \Session::get('cart');
        $total = $this->total();
    	//dd($total);
    	return view('store.index', compact('products', 'total'));
    }

    public function show($slug)
    {
    	$product = Product::where('slug', $slug)->first();
    	//dd($product);

    	return view('store.show', compact('product'));
    }
    public function redirect()
    {
        return redirect('home');
    }

    private function total()
    {
        $cart = \Session::get('cart');
        $total = 0;
        foreach($cart as $item){
            $total += $item->price * $item->quantity;
        }

        return $total;
    }
}
