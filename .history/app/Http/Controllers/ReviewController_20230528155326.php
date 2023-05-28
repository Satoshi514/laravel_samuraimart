<?php

namespace App\Http\Controllers;

use App\Models\Review;
use illuminate\Support\Fadecas\Auth;
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
        $review->user_id = $request->input('user_id');
        $review->save();

        return back();
    }
}