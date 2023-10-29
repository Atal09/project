<?php


namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
// Definieer een nieuwe controller genaamd ProductController
class ProductController extends Controller
{

    public function products()
    {
        // Methode voor het ophalen van alle producten en weergeven op de productpagina methode products()
        $products = Product::all();

        return view('product.product', compact('products'));
    }
    # Methode voor het weergeven van het formulier voor het maken van een nieuw product methode create()
    public function create(){
        return view('product.create');
    }
    # Methode voor het weergeven van het bewerkingsformulier voor een bestaand product methode edit(Product $product)
    public function edit(Product $product){
        return view('product.edit', compact('product'));

    }
    # Methode voor het opslaan van een nieuw product in de database methode store(Request $request)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'year' => 'required|integer',
        ]);

        $product = new Product();
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->year = $request->input('year');
        $product->save();

        return redirect()->route('product.product');
    }

# Methode voor het bijwerken van een bestaand product in de database methode update(Request $request, Product $product)
    public function update(Request $request, Product $product){
        $request->validate([
            'title'=>'required',
            'price'=>'required|numeric',
            'year'=>'required',


        ]);
        $product->fill($request->post())->save();
        return redirect()->route('product.product')->with('updated');


    }
    # Methode voor het verwijderen van een product
    public function destroy(Product $product)
    {
        if (!$product) {
            return redirect()->route('product.product')->with('error', 'Product not found');
        }

        if (!$this->canDeleteProduct($product)) {
            return redirect()->route('product.product')->with('error', 'You are not allowed to delete this product.');
        }

        if ($product->dislikes >= 5) {
            $product->delete();
            return redirect()->route('product.product')->with('deleted', 'Product deleted successfully');
        } else {
            return redirect()->route('product.product')->with('error', 'You cannot delete this product until it has received at least 5 dislikes.');
        }
    }

    # Methode om te controleren of een gebruiker een product kan verwijderen
    protected function canDeleteProduct(Product $product) {
        return $product->dislikes >= 5 && $product->user_id == auth()->user()->id;
    }
    # Methode voor het verhogen van het aantal dislikes voor een product
    public function dislike(Product $product)
    {
        if (auth()->check()) {
            // Voer hier de logica uit om de dislike te verwerken en de teller te verhogen
            $product->increment('dislikes');
        }

        return redirect()->route('product.product');
    }


    # Methode voor het in- of uitschakelen van de status van een product
    public function toggleStatus(Product $product)
    {
        $product->update(['status' => !$product->status]);

        return redirect()->route('product.product');
    }

    public function find(Request $request)
    {
        $year = $request->input('year');
        $title = $request->input('title');

        $productsQuery = Product::query();

        if (!empty($year)) {
            $productsQuery->where('year', $year);
        }

        if (!empty($title)) {
            // Hier voeg je de code toe om de invoer te valideren en te escapen
            $title = $request->input('title');
            $productsQuery->where('title', 'LIKE', '%' . $title . '%');
        }

        $products = $productsQuery->get();

        return view('product.product', compact('products'));
    }







}



