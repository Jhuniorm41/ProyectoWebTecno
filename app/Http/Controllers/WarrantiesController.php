<?php

namespace App\Http\Controllers;

use App\Product;
use App\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarrantiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::user()->countPage(4);
        $warranties = warranty::all();
        return view('warranties.index')->with('warranties',$warranties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Auth::user()->countPage(4);
        $products = Product::all();
        return view('warranties.create')->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Warranty::create($request->all());
        return redirect()->route('warranties.index');
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
        Auth::user()->countPage(4);
        $warranty = Warranty::findOrFail($id);
        return view('warranties.edit')->with('warranty',$warranty);
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
        $warranty = Warranty::findOrFail($id);
        $warranty->date_extension = $request->get('date_extension');
        $warranty->save();
        return redirect()->route('warranties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warranty = Warranty::findOrFail($id);
        $warranty->delete();
        return redirect()->route('warranties.index');
    }
}
