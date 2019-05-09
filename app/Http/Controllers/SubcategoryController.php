<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$subcategorys = subcategory::all();
        $subcategorys = Category::with('subcategories')->get();   
        return view('subcategory.index', compact('subcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        return view('subcategory.create', compact('categorys'));
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
            'category_id' => 'required',
            'name'=>'required',
        ]);

        $subcategory = new subcategory([
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id'),
        ]);
        $subcategory->save();
        return redirect('/subcategory')->with('success', 'Congratulation! You have successfully Added a subcategory.');
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
        $categorys = Category::all();
        $subcategory = subcategory::find($id);
        
        return view('subcategory.edit', compact('subcategory', 'categorys'));
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
            'name'=>'required',
        ]);
        $subcategory = subcategory::find($id);
        $subcategory->name = $request->get('name');
        $subcategory->save();
        return redirect('/subcategory')->with('success', 'subcategory Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = subcategory::find($id);
        $subcategory->delete();
        return redirect('/subcategory')->with('success', 'subcategory Deleted Successfully.');

    }
}
