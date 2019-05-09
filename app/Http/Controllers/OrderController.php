<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        //echo "<pre>";
        //print_r($products);
        //die("ok");
        return view('orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($sku); die;
        $productInfo = $request->get('product_id');
        
        $productArray = explode('|',$productInfo);
        $product_id = $productArray[0];
        //print_r($productArray); die;
        $this->validate($request, [
            'sku'=>'required',
            'item_quantity'=>'required',
            'item_price'=>'required',
            'item_profit'=>'required',
        ]);
        
        $data = Product::whereRaw('id', $product_id)->select('category_id', 'subcategory_id')->get();
        $subcateId =  $data[0]->subcategory_id;
        $cateId =  $data[0]->category_id;
        
        $order = new order([
            'sku' => $request->get('sku'),
            'order_id' => $request->get('sku').'_'.date("Y-m-d h:i:s"),
            'item_quantity' => $request->get('item_quantity'),
            'order_date' => date("Y-m-d h:i:s"),
            'item_price' => $request->get('item_price'),
            'item_profit' => $request->get('item_profit'),
            'product_id' => $product_id,
            'category_id' => $cateId,
            'subcategory_id' => $subcateId,
        ]);
        
        $order->save();
        return redirect('/orders')->with('success', 'Congratulation! You have successfully Added a order.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all();
        $order = Order::find($id);
        return view('orders.edit', compact('order','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productInfo = $request->get('product_id');
        $productArray = explode('|',$productInfo);
        $product_id = $productArray[0];
        //print_r($sku1); die;
        $this->validate($request, [
            'sku'=>'required',
            'item_quantity'=>'required',
            'item_price'=>'required',
            'item_profit'=>'required',
        ]);

        $data = Product::whereRaw('id', $product_id)->select('category_id', 'subcategory_id')->get();
        $subcateId =  $data[0]->subcategory_id;
        $cateId =  $data[0]->category_id;
        
        $order = Order::find($id);
        $order->sku = $request->get('sku');
        $order->item_quantity = $request->get('item_quantity');
        $order->order_date = date("Y-m-d h:i:s");
        $order->item_price = $request->get('item_price');
        $order->item_profit = $request->get('item_profit');
        $order->product_id = $product_id;
        $order->category_id = $cateId;
        $order->subcategory_id = $subcateId;
        $order->save();
        return redirect('/orders')->with('success', 'Congratulation! You have successfully updated order.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
