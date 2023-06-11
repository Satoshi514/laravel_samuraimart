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

        $recent_products = Product::orderBy('created_at','desc')->take(4)->get();

        return view('web.index',compact('major_categories','categories'));
    }
}
