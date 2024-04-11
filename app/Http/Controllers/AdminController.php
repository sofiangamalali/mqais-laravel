<?php

namespace App\Http\Controllers;

use App\Models\BestSeller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Categories()
    {
        $categories=Category::get();
        return view("admin.categories",compact('categories'));
    }
    public function SubCategories()
    {

        $subCategories = SubCategory::get();
        foreach ($subCategories as $subCategory) {
            $subCategory['category_name'] = Category::where('id', $subCategory['cat_id'])->get();
        }
        $allCategories=Category::get();
        return view("admin.subCategories",compact('subCategories','allCategories'));
    }
    public function Products()
    {
        $products=Product::get();
        foreach ($products as $product) {
            $product['category_name'] = Category::where('id', $product['cat_id'])->get(['en_name','ar_name']);
            $product['sub_category_name'] = SubCategory::where('id', $product['sub_cat_id'])->get(['en_name','ar_name']);
        }
        $allCategories=Category::get();

        return view("admin.products",compact('products','allCategories'));
    }
    public function BestSeller()
    {
        $bestSeller=BestSeller::get();
        $products=[];
        foreach($bestSeller as $bs){
            $product=Product::where('id', $bs->product_id)->get();
            $product=$product[0];
            $product['category_name'] = Category::where('id', $product->cat_id)->get(['en_name','ar_name']);
            $product['sub_category_name'] = SubCategory::where('id', $product->sub_cat_id)->get(['en_name','ar_name']);
            array_push($products,$product);
        }

        $allCategories=Category::get();
        return view("admin.bestSeller",compact('products','allCategories'));
    }
    
}
