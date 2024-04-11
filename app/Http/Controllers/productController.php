<?php

namespace App\Http\Controllers;

use App\Models\BestSeller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\In;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    //
    public function index()
    {
        $categories = Category::get();
        foreach ($categories as $category) {
            $category['sub_categories'] = SubCategory::where('cat_id', $category['id'])->get();
        }
        $links = $categories;

        $bestSeller = BestSeller::get();
        $products = [];
        foreach ($bestSeller as $bs) {
            $product = Product::where('id', $bs->product_id)->get();
            $product = $product[0];
            array_push($products, $product);
        }

        return view('products', compact("products", "links"));
    }

    public function showCategoryProducts(Request $request)
    {
        $categories = Category::get();
        foreach ($categories as $category) {
            $category['sub_categories'] = SubCategory::where('cat_id', $category['id'])->get();
        }
        $links = $categories;

        $mainRoute = [];
        if (isset($request->subCategory)) {
            $products = Product::where('cat_id', '=', $request->category)
                ->where('sub_cat_id', '=', $request->subCategory)
                ->get();
            $cat = Category::where('id', $request->category)->get();
            $subCat = SubCategory::where('id', $request->subCategory)->get();
            $mainRoute['category'] = $cat;
            $mainRoute['subCategory'] = $subCat;
        } else {
            $products = Product::where('cat_id', '=', $request->category)
                ->get();
            $cat = Category::where('id', $request->category)->get();
            $mainRoute['category'] = $cat;
        }
        return view('products', compact('products', 'mainRoute', 'links'));
    }
    public function showProduct($id)
    {
        $categories = Category::get();
        foreach ($categories as $category) {
            $category['sub_categories'] = SubCategory::where('cat_id', $category['id'])->get();
        }
        $links = $categories;

        $product = Product::find($id);
        if ($product != null) {
            return view('product', compact('links', 'product'));
        } else {
            return redirect()->back();
        }
    }

    public function getLinks()
    {

        $categories = Category::get();
        foreach ($categories as $category) {
            $category['sub_categories'] = SubCategory::where('cat_id', $category['id'])->get();
        }
        return $categories;
    }

    public function store(Request $request)
    {
        //validation section
        $validator = Validator::make(
            $request->all(),
            [
                'en_name' => "required|max:100",
                'ar_name' => "required|max:100",
                'cat_id' => "required",
                'image' => "required|file",
                'manual' => "file",
                'ar_description' => "file",
                'en_description' => "file",
                'addCaptcha' => "required|captcha",
            ],
            $this->getMessages()
        );
        // return $request;
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all())->with(["failed" => "The Proccess Failed !!"]);
        } else {
            //insertion
            if ($request->hasFile('image') && $request->hasFile('manual') && $request->hasFile('ar_description') && $request->hasFile('en_description')) {
                $model = new Product();
                $model->ar_name = $request->ar_name;
                $model->en_name = $request->en_name;
                $model->cat_id = $request->cat_id;
                $model->sub_cat_id = $request->sub_cat_id;

                $model->save();

                $lastInsertedId = $model->id;
                $image_name = '' . $lastInsertedId . '.jpg';
                $manual_pdf = '' . $lastInsertedId . '_manual.pdf';
                $ar_details_pdf = '' . $lastInsertedId . '_ar_details.pdf';
                $en_details_pdf = '' . $lastInsertedId . '_en_details.pdf';

                $request->file('image')->storeAs('public/products', $image_name);
                $model->image = $image_name;

                if (isset($request->manual)) {
                    $request->file('manual')->storeAs('public/manual', $manual_pdf);
                    $model->manual_pdf = $manual_pdf;
                }
                if (isset($request->ar_description)) {
                    $request->file('ar_description')->storeAs('public/details', $ar_details_pdf);
                    $model->ar_details_pdf = $ar_details_pdf;
                }
                if (isset($request->en_description)) {
                    $request->file('en_description')->storeAs('public/details', $en_details_pdf);
                    $model->en_details_pdf = $en_details_pdf;
                }

                $model->save();
                return redirect()->back()->with(["success" => "The Proccess Done Successfully !!"]);
            } else {
                return redirect()->back();
            }
        }
    }

    public function edit(Request $request)
    {
        //validation section
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required',
                'en_name' => "required|max:100",
                'ar_name' => "required|max:100",
                'editCaptcha' => "required|captcha",
            ],
            $this->getMessages()
        );
        // return $request;
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all())->with(["failed" => "The Proccess Failed !!"]);
        } else {
            //insertion
            $model = Product::find($request->id);
            // Update the attributes of the model
            $model->fill([
                'en_name' => $request->en_name,
                'ar_name' => $request->ar_name
            ]);
            // Save the changes to the database
            $model->save();
            return redirect()->back()->with(["success" => "The Proccess Done Successfully !!"]);
        }
    }
    public function delete(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'id' => "required",
                'delCaptcha' => "required|captcha",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all())->with(["failed" => "The Proccess Failed !!"]);
        } else {
            $prod = Product::select('image', 'ar_details_pdf','en_details_pdf', 'manual_pdf')
                ->where('id', $request->id)
                ->get();

            $prod = $prod[0];

            $imagePath = 'public/products/' . $prod->image;
            $manualPath = 'public/manual/' . $prod->manual_pdf;
            $ar_detailsPath = 'public/details/' . $prod->ar_details_pdf;
            $en_detailsPath = 'public/details/' . $prod->en_details_pdf;

            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }

            if (Storage::exists($manualPath)) {
                Storage::delete($manualPath);
            }

            if (Storage::exists($ar_detailsPath)) {
                Storage::delete($ar_detailsPath);
            }

            if (Storage::exists($en_detailsPath)) {
                Storage::delete($en_detailsPath);
            }

            Product::destroy($request->id);
            BestSeller::where('product_id', $request->id)->delete();
            return redirect()->back()->with(["success" => "The Proccess Done Successfully !!"]);
        }
    }

    protected function getMessages()
    {
        $masseges = [
            'en_name.required' => 'The first name field is required.',
            'en_name.max:100' => 'The first name may not be greater than :max characters.',
            'ar_name.required' => 'The last name field is required.',
            'ar_name.max:100' => 'The last name may not be greater than :max characters.',
        ];
        return $masseges;
    }
    protected function getRules()
    {
        $rules = [
            'en_name' => "required|max:100",
            'ar_name' => "required|max:100",
            'Captcha' => "required|captcha",
        ];
        return $rules;
    }
    public function deleteProductResources($id)
    {
        $prod = Product::select('image', 'ar_details_pdf','en_details_pdf', 'manual_pdf')
            ->where('id', $id)
            ->get();

        $prod = $prod[0];


        $imagePath = 'public/products/' . $prod->image;
        $manualPath = 'public/manual/' . $prod->manual_pdf;
        $ar_detailsPath = 'public/details/' . $prod->ar_details_pdf;
        $en_detailsPath = 'public/details/' . $prod->en_details_pdf;

        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        if (Storage::exists($manualPath)) {
            Storage::delete($manualPath);
        }

        if (Storage::exists($ar_detailsPath)) {
            Storage::delete($ar_detailsPath);
        }

        if (Storage::exists($en_detailsPath)) {
            Storage::delete($en_detailsPath);
        }

        Product::destroy($id);

        return true;
    }
}
