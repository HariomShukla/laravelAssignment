<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Subcategory;
use DB;

class ReportController extends Controller
{
    public function index()
    {
        $categorys = Category::all();
        $subcategorys = Subcategory::all();
        $products = Product::all();
        return view('reports.index', compact('products','categorys','subcategorys'));
    }

    public function linkproduct(Request $request)
    {
        //die("Linked");
        $this->validate($request, [
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'product_id'=>'required',            
        ]);
        
        $product_id = $request->get('product_id');

        $productId = Product::find($product_id);
        $categoryId = $request->get('category_id');
        $subcategoryId = $request->get('subcategory_id');
       
        DB::table('products')
            ->where('id', $product_id)
            ->update(['category_id' => $categoryId, 'subcategory_id'=> $subcategoryId]);
        
        DB::table('orders')
            ->where('product_id', $product_id)
            ->update(['category_id' => $categoryId, 'subcategory_id'=> $subcategoryId]);
        

        return redirect('/products')->with('success', 'Congratulation! You have successfully Linked products.');
    }

    public function report()
    {
        $orders = array();
        return view('reports.report', compact('orders'));
    }

    public function candidate()
    {
        return view('reports.candidate');
    }
}