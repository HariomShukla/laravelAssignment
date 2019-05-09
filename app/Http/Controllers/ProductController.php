<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Subcategory;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->join('categories as categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name', 'subcategories.name as subcategory_name')
            ->get();
            
        //$products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        $subcategorys = Subcategory::all();
        return view('products.create', compact('categorys','subcategorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sku'=>'required',
            'title'=>'required',
            'quantity'=>'required',
            'selling_price'=>'required',
            'buying_price'=>'required',
            'category_id' =>'required',
            'subcategory_id' =>'required',
        ]);

        $product = new Product([
            'sku' => $request->get('sku'),
            'title' => $request->get('title'),
            'quantity' => $request->get('quantity'),
            'selling_price' => $request->get('selling_price'),
            'buying_price' => $request->get('buying_price'),
            'category_id' =>$request->get('category_id'),
            'subcategory_id' =>$request->get('subcategory_id')
        ]);
        $product->save();
        return redirect('/products')->with('success', 'Congratulation! You have successfully Added a product.');
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
        $product = Product::find($id);
        return view('products.edit', compact('product'));
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
        $this->validate($request, [
            'sku'=>'required',
            'title'=>'required',
            'quantity'=>'required',
            'selling_price'=>'required',
            'buying_price'=>'required',
            
        ]);
        
        $product = Product::find($id);
        
        $product->sku = $request->get('sku');
        $product->title = $request->get('title');
        $product->quantity = $request->get('quantity');
        $product->selling_price = $request->get('selling_price');
        $product->buying_price = $request->get('buying_price');
        
       
        $product->save();
        return redirect('/products')->with('success', 'Congratulation! You have successfully Updated product details.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'Product deleted!');
    }
}
