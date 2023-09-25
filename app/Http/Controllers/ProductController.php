<?php


namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', ['product' => $product]);
    }
    public function index()
    {
        $product = new Product();
        $product->title = 'PC';
        $product->price = 1050;

        return view('product.product', ['product' => $product]);
    }



}



