<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class aboutUsController extends Controller
{
    //
    public function index()
    {
        $categories = Category::get();
        foreach ($categories as $category) {
            $category['sub_categories'] = SubCategory::where('cat_id', $category['id'])->get();
        }
        $links = $categories;
        
        return view('aboutUs', compact("links"));
    }
    
}
