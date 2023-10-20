<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FavoriteController extends Controller{
    public function index(){
        $favorites = favorite::all();
        return view('favorite.favorite',compact('favorites'));




    }

    public function create(){
        return view('favorite.create');


    }

    public function store(Request $request){
        $request->validate([
            'product_id'=>'required'


        ]);
        $favorite = new Favorite();
        $favorite->title = $request->input('product_id');
        $favorite->save();

        return redirect()->route('favorite.favorite');
    }






}
