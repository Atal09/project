<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;


class ReviewController extends Controller{
    public function index(){
        $reviews = review::all();
        return view('review.review',compact('reviews'));



    }

    public function create(){
        return view('review.create');


    }


    public function store(Request $request){
        $request->validate([
            'user_id'=>'required',
            'product_id'=>'required',
            'review'=>'required',
            'rating'=>'required'


        ]);
        $review = new Review();
        $review->title = $request->input('user_id');
        $review->title = $request->input('product_id');
        $review->title = $request->input('review');
        $review->title = $request->input('rating');

        $review->save();

        return redirect()->route('review.review');
    }





}
