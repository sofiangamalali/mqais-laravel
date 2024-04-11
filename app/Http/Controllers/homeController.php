<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use stdClass;
use App\Http\Controllers\LaravelLocalization;
use App\Models\BestSeller;
use App\Models\Product;
use App\Models\SubCategory;
use Mcamara\LaravelLocalization\LaravelLocalization as LaravelLocalizationLaravelLocalization;

class homeController extends Controller
{
    //

    public function index()
    {
        function getLinks()
        {
            $li = array();
            $categories = Category::get();
            foreach ($categories as $category) {
                $category['sub_categories'] = SubCategory::where('cat_id', $category['id'])->get();
            }
            return $categories;
        }

        $bestSeller = BestSeller::get();
        $homeProducts = [];
        foreach ($bestSeller as $bs) {
            $product = Product::where('id', $bs->product_id)->get();
            $product = $product[0];
            array_push($homeProducts, $product);
        }

        $links = getLinks();
        
        return view('home', compact("homeProducts", "links"));
    }
    public function getLinks()
    {
        $li = array();
        $categories = Category::get();
        foreach ($categories as $category) {
            $category['sub_categories'] = SubCategory::where('cat_id', $category['id'])->get();
        }
        return $categories;
    }
}
