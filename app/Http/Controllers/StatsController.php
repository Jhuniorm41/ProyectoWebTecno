<?php

namespace App\Http\Controllers;

use App\Product;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function index()
    {
        $array1=[];
        $array2=[];
        $array3=[];
        $array4=[];
        $products_warranty = Product::groupBy('type_product_id')->select('type_product_id', DB::raw('count(*) as total'))->get();
        $reservations = Reservation::groupBy('client_id')->select('client_id', DB::raw('count(*) as total'))->get();
        //dd($products_warranty);
        foreach ($products_warranty as $prod)
        {
            array_push($array1,$prod->total);
            array_push($array2,$prod->type_product->description);
        }

        foreach ($reservations as $reservation)
        {
            array_push($array3,$reservation->total);
            array_push($array4,$reservation->client->name);
        }
        //dd(json_encode($array2));
       return view('stats.index')->with('data1',json_encode($array1))->with('labels1',json_encode($array2))
           ->with('data2',json_encode($array3))->with('labels2',json_encode($array4));
    }
}
