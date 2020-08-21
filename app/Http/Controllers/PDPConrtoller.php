<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Product;
use App\Order;


class PDPConrtoller extends Controller
{
    public function PDFgeneroter(Request $id)
    {
    //    // $products = Product::all();
    //    // dd($products);
        $pdf = PDF::loadView('pdf.invoice');
        return $pdf->download('SSbill.pdf');
    //     return view('pdf.invoice');
    }
}
