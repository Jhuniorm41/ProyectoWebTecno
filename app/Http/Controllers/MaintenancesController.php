<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\Quotation;
use Illuminate\Http\Request;

class MaintenancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenances = Maintenance::all();
        return view('maintenances.index')->with('maintenances',$maintenances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quotes = Quotation::all();
        return view('maintenances.create')->with('quotes', $quotes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quotation = Quotation::findOrFail($request->get('quotation_id'));
        if($quotation->product->warranty == null){
            Maintenance::create($request->all());
            $texto = "El producto no cuenta con garantia por lo que su mantenimiento tiene un coste";
            return redirect()->route('maintenances.index');
        }
        else{
            $date1 = $quotation->product->warranty->date_finish;
            $date2 = $request->get('date');
            if($date1 > $date2){
                $maintenance = new Maintenance();
                $maintenance->amount = 0;
                $maintenance->date = $request->get('date');
                $maintenance->quotation_id = $request->get('quotation_id');
                $maintenance->save();
                $texto = "El producto cuenta con garantia vigente por lo que el costo es 0";
                return redirect()->route('maintenances.index')->with('success',$texto);
            }
            else{
                Maintenance::create($request->all());
                $texto = "El producto no cuenta con garantia por lo que su mantenimiento tiene un coste";
                return redirect()->route('maintenances.index')->with('success',$texto);
            }
        }


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
        $maintenance = Maintenance::findOrFail($id);
        return view('maintenances.edit')->with('maintenance',$maintenance);
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
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->amount = $request->get('amount');
        $maintenance->date = $request->get('date');
        $maintenance->save();
        return redirect()->route('maintenances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->delete();
        return redirect()->route('maintenances.index');
    }
}
