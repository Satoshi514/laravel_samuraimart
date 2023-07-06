<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $review = new Review();
        $review->content = $request->input('content');
        $review->product_id = $request->input('product_id');
        $review->user_id = Auth::user()->id;
        $review->score = $request->input('score');
        $review->save();

        return back();
    }

    public function show(Product $product)
    {
        $reviews = $product->reviews()->get();
        $score_total=0;
        $review_count= count($reviews);

        if ($review_count > 0) {
         foreach ($reviews as $review) {
             $score_total += $review->score;         
            }

         $score_total =round($score_total/0.5,0)*0.5;
         $review_average = $score_total/$review_count;
        } else {
         $review_average = 0;
        }

        return view('products.index',compact('product', 'reviews','review_average','review_count'));
    }
}


