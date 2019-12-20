<?php

namespace App\Http\Controllers;

use App\Quotation;
use App\QuotationDetail;
use Illuminate\Http\Request;

class QuotesDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total = 0;
        $array1 = [];
        $array2 = [];
        $type_services = $request->get('type_service_id');
        $subtotals = $request->get('subtotal');
        $quotation = Quotation::findOrFail($request->get('quotation_id'));
        foreach ($type_services as $type_service => $value) {
            $element = ["type_service_id" => $value];
            array_push($array1, $element);
        }
        foreach ($subtotals as $subtotal => $value) {
            $element = ["subtotal" => $value];
            array_push($array2, $element);
        }

        $tamaño = sizeof($array2);
        for ($i=0; $i < $tamaño; $i++){
            if($array2[$i]["subtotal"] != null){
                $service = $array1[$i]["type_service_id"];
                $sub = $array2[$i]["subtotal"];
                $total = $total + $sub;
                $quotation_detail = new QuotationDetail();
                $quotation_detail->subtotal = $sub;
                $quotation_detail->type_service_id = $service;
                $quotation_detail->quotation_id = $quotation->id;
                $quotation_detail->save();
            }
        }
        $quotation->amount = $total;
        $quotation->save();
        return redirect()->route('quotes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
