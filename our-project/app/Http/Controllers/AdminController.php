<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Store;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     $stores = Store::latest()->paginate(4); 
     return view('admin.index', compact('stores'));
    }



    //add page
    public function create()
    {
        return view('admin.create');
    }

    //add data to database and redirect to the index page
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);

        $stores = Store::create($request->all());
         return redirect()->route('admin.index')
         ->with('success','store added successflly') ;
    }

   // show all details of a product
    public function show(Store $store)
    {
        return view('admin.show', compact('store'))  ;
    }


    //update page
    public function edit(Store $store)
    {
        return view('admin.edit', compact('store'))  ;
    }

    //update data to database and redirect to the index page
    public function update(Request $request, Store $store)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'detail'=>'required'
        ]);

        $store->update($request->all());
         return redirect()->route('admin.index')
         ->with('success','store updated successflly') ;
    }


    //delete a product and redirect to the index page
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('admin.index')
        ->with('success','store deleted successflly') ;
    }

    // public function search()
    // {
    //     $search_text = $_GET['query'];
    //     $products = Product::where('name','LIKE','%'.$search_text.'%')->get();
    //     return view('product.search', compact('products'));
    // }
}
