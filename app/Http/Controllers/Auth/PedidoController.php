<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;


class PedidoController extends Controller
{

    public function __construct()
    {
        if(!\Session::has('cart')) \Session::put('cart', array());
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cart = \Session::get('cart');

        $subtotal = 0;
        foreach($cart as $item){
            $subtotal += $item->price * $item->quantity;
        }
        
        $order = Order::create([
            'subtotal' => $subtotal,
            'shipping' => 100,
            'user_id' => \Auth::user()->id
        ]);
        foreach($cart as $item){
            $this->saveOrderItem($item, $order->id);
        }
        return \Redirect::route('home')
        ->with('message', 'Pedido realizado de forma correcta');
        
    }
    
    public function saveOrderItem($item, $order_id)
    {
        OrderItem::create([
            'quantity' => $item->quantity,
            'price' => $item->price,
            'product_id' => $item->id,
            'order_id' => $order_id
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}