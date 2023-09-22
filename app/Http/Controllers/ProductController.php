<?php


namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function index()
    {
        $product = new Product();
        $product->title = 'PC';
        $product->price = 1050;

        return view('product.product', ['product' => $product]);
    }



}



