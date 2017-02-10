<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = Order::orderBy('id', 'desc')->paginate(100);
    	//dd($orders);
    	return view('admin.order.index', compact('orders'));
    } 

    public function getItems(Request $request)
    {
    	$items = OrderItem::with('product')->where('order_id', $request->get('order_id'))->get();
    	return json_encode($items);
    }

    public function destroy($id)
    {
        return view('admin.order.index', compact('orders')); 

        //$order = Order::findOrFail($id);
        
        //dd($orders);

        //$deleted = $order->delete();
        
        //$message = $deleted ? 'Pedido eliminado correctamente!' : 'El Pedido NO pudo eliminarse!';
        
        //return redirect()->route('admin.order.index')->with('message', $message);
    }
}
