<?php

namespace App\Http\Controllers;

use App\Quotation;
use App\QuotationDetail;
use App\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $texto = "";
        $total = 0;
        $services = TypeService::all();
        $quotation = Quotation::findOrFail($request->get('quotation_id'));
        for ($i=0; $i < sizeof($services); $i++){
            $service = 'type_service_id'.$i;
            $sub = 'subtotal'.$i;
            $service1 =$request->get($service);
            $sub1 =  $request->get($sub);
            if( $service1 != null && $sub1 != null){

                $serv = DB::table('promotions')->latest('id')->first();
                if ($serv!= null){
                   $sub1 = $sub1 - ($sub1*($serv->discount/100));
                   $texto = $texto." Se aplico un descuento de ".$serv->discount."% por la promocion ".$serv->name;
                }

                $total = $total + $sub1;
                $quotation_detail = new QuotationDetail();
                $quotation_detail->subtotal = $sub1;
                $quotation_detail->type_service_id = $service1;
                $quotation_detail->quotation_id = $quotation->id;
                $quotation_detail->save();
            }
        }
        $quotation->amount = $total;
        $quotation->save();
        if ($texto == ""){
            return redirect()->route('quotes.index');
        }
        else{
            return redirect()->route('quotes.index')->with('success', $texto);
        }


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
