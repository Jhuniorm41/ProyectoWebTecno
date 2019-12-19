<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\TypeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::user()->countPage(2);
        $products = Product::all();
        return view('products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Auth::user()->countPage(2);
        $categories = TypeProduct::all();
        $clients = Client::all();
        return view('products.create')->with('categories',$categories)->with('clients', $clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index');
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
        Auth::user()->countPage(2);
        $product = Product::findOrFail($id);
        $categories = TypeProduct::where('id', '!=', $product->type_product->id)->get();
        $clients = Client::where('id','!=', $product->client_id)->get();
        return view('products.edit')->with('product',$product)->with('categories',$categories)->with('clients',$clients);
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
        $product = Product::findOrFail($id);
        $product->name = $request->get('name');
        $product->code = $request->get('code');
        $product->sale_code = $request->get('sale_code');
        $product->client_id = $request->get('client_id');
        $product->type_product_id = $request->get('type_product_id');
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
