<?php

namespace App\Http\Controllers;

use App\Product;
use App\Quotation;
use App\Reservation;
use App\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::user()->countPage(6);
        $quotes = Quotation::all();
        return view('quotes.index')->with('quotes',$quotes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Auth::user()->countPage(6);
        $reservations = Reservation::all();
        $products = Product::all();
        return view('quotes.create')->with('products',$products)->with('reservations', $reservations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('Y-m-d');
        $quotation = new Quotation();
        $quotation->code = $request->get('code');
        $quotation->amount = 0;
        $quotation->date_register = $date;
        $quotation->reservation_id = $request->get('reservation_id');
        $quotation->product_id = $request->get('product_id');
        $quotation->save();

        $quotation = Quotation::latest()->first();
        $type_services = TypeService::all();
        return view('quotes_detail.create')->with('quotation',$quotation)->with('type_services', $type_services);
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
        Auth::user()->countPage(6);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();
        return redirect()->route('quotes.index');
    }
}
