<?php

namespace App\Http\Controllers;

use App\Models\BestSeller;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BestSellerController extends Controller
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
    public function get($catId, $subCatId)
    {
        return response()->json(Product::where('cat_id', $catId)->where('sub_cat_id', $subCatId)->get());
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
                'cat_id' => "required",
                'sub_cat_id' => "required",
                'product_id' => "required",
                'addCaptcha' => "required|captcha",
            ],
            $this->getMessages()
        );
        // return $request;
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all())->with(["failed" => "The Proccess Failed !!"]);
        } else {
            //insertion
            try {
                $model = new BestSeller();
                $model->product_id = $request->product_id;
                $model->save();
            } catch (QueryException $e) {
                // Handling the duplicate entry error
                return redirect()->back()->withErrors($validator)->withInputs($request->all())->with(["failed" => "The Proccess Failed !!"]);
            }
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
            BestSeller::destroy($request->id);
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
    public function edit($id)
    {
        //
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
