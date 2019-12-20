<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\TypeProduct;
use App\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::user()->countPage(7);
        $promotions = Promotion::all();
        return view('promotions.index')->with('promotions',$promotions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Auth::user()->countPage(7);
        $services = TypeService::all();
        $products = TypeProduct::all();
        return view('promotions.create')->with('services',$services)->with('products',$products);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Promotion::create($request->all());
        return redirect()->route('promotions.index');
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
        Auth::user()->countPage(7);
        $promotion = Promotion::findOrFail($id);
        $products = TypeProduct::where('id', '!=', $promotion->type_product_id)->get();
        $services = TypeService::where('id', '!=', $promotion->type_service_id)->get();
        return view('promotions.edit')->with('services',$services)->with('products',$products)->with('promotion',$promotion);
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
        $promotion = Promotion::findOrFail($id);
        $promotion->name = $request->get('name');
        $promotion->discount = $request->get('discount');
        $promotion->date_start = $request->get('date_start');
        $promotion->date_finish = $request->get('date_finish');
        $promotion->type_service_id = $request->get('type_service_id');
        $promotion->type_product_id = $request->get('type_product_id');
        $promotion->save();
        return redirect()->route('promotions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
        return redirect()->route('promotions.index');

    }
}
