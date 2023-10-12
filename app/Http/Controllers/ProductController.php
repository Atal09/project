<?php


namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {



        $products = Product::all();


        return view('product.product',compact('products'));
    }
    public function create(){
        return view('product.create');


    }
    public function edit(Product $product){
        return view('product.edit');


    }
    public function store(Request $request){
        $request->validate([
           'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric'


        ]);
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        $product->save();
        redirect()->route('product.product');
    }

//    public function show(){
//
//
//    }
    public function update(Request $request, Product $product){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric'


        ]);
        $product->fill($request->post())->save();
        return redirect()->route('product.product')->with('updated');


    }
    public function destroy(Product $product){
        if (!$product) {
            return redirect()->route('product.product')->with('error', 'Product not found');
        }

        $product->delete();
        return redirect()->route('product.product')->with('deleted', 'Product deleted successfully');
    }


}



