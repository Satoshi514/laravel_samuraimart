<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\Product;

class WebController extends Controller
{
    public function index() {
        $categories = Category::all();

        $major_categories = MajorCategory::all();

        $recently_products = Product::orderBy('created_at','desc')->take(4)->get();

        $recommend_products = Product::where('recommend_flag', true)->take(3)->get();
       
        $reviews =$product->reviews()->get();

        $score_total=0;
        $review_count= count($reviews);
        
        if ($reviews_count > 0) {
         foreach ($reviews as $review) {
             $score_total += $review->score;
         }

         $score_total =round($review_count/0.5,0)*0.5;
         $review_average = $score_total/$review_count;
        } else {
         $review_average = 0;
        }
        dd($review_count);
        return view('web.index',compact('major_categories','categories','recently_products','recommend_products','product','reviews','review_average','review_count'));
     }
}
    