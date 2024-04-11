<?php

namespace App\Http\Controllers;

use App\Models\BestSeller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation section
        $validator = Validator::make(
            $request->all(),
            [
                'en_name' => "required|max:100",
                'ar_name' => "required|max:100",
                'addCaptcha' => "required|captcha",
            ],
            $this->getMessages()

        );
        // return $request;
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all())->with(["failed" => "The Proccess Failed !!"]);
        } else {
            //insertion
            Category::create([
                "en_name" => $request->en_name,
                "ar_name" => $request->ar_name
            ]);
            return redirect()->back()->with(["success" => "The Proccess Done Successfully !!"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

            $model = Category::find($request->id);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function destroy($request)
    {
        //
        return $request;
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'id' => "required",
        //         'Captcha' => "required|captcha",
        //     ]
        // );
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInputs($request->all())->with(["failed" => "The Proccess Failed !!"]);
        // } else {
        //     Category::destroy($request->id);
        //     return redirect()->back()->with(["success" => "The Proccess Done Successfully !!"]);
        // }
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

            Category::destroy($request->id);
            SubCategory::where('cat_id', $request->id)->delete();
            $products = Product::where('cat_id', $request->id)->get('id');
            $prodController = new productController();
            foreach ($products as $product) {
                $result = $prodController->deleteProductResources($product->id);
                BestSeller::where('product_id', $product->id)->delete();
            }
            // 12 13 18 19 21 
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
}
