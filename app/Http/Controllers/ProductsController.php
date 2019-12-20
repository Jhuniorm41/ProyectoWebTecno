<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\TypeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

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

    public function reportReparaciones($id) {
        //sdd($id);
        $data = Product::join('quotations as q','q.product_id', 'products.id')
                        ->join('maintenances as m', 'm.quotation_id', 'q.id')
                        ->join('clients as c', 'c.id', 'products.client_id')
                        ->select('m.*', 'c.*')
                        ->where('products.id', $id)
                        ->get();
        //dd($data);
        $name = Auth()->user()->name;

        $year = date('Y');
        $mes = date('m');
        $dia = date('d');

        $hora = date('H');
        $minuto = date('i');
        $segundo = date('s');

        $fecha = $dia.'/'.$mes.'/'.$year;
        $hora = $hora.':'.$minuto.':'.$segundo;


        $pdf = PDF::loadView('products.productsReport', [
            'fecha' => $fecha,
            'data' => $data
        ]);

        $pdf->setPaper('A4', 'landscape');

        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text(750, 570, "Pag. {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        $canvas->page_text(50, 570, $name, null, 10, array(0, 0, 0));
     
        return $pdf->stream('maintances.pdf');
    }
}
