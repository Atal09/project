<?php


namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products=

        $products = Product::all();


        return view('product',compact('products'));
    }
    public function create(){


    }
    public function edit($id){


    }
    public function update($id){


    }
    public function destroy($id){


    }


}



