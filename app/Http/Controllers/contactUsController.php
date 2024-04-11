<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Category;
use App\Models\Message;
use App\Models\Product;
use App\Models\SubCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class contactUsController extends Controller
{
    //
    public function index()
    {
        $categories = Category::get();
        foreach ($categories as $category) {
            $category['sub_categories'] = SubCategory::where('cat_id', $category['id'])->get();
        }
        $links = $categories;

        return view('contactUs', compact("links"));
    }
    public function sendMail(Request $request)
    {
        //validation section
        $validator = Validator::make(
            $request->all(),
            $this->getRules(),
            $this->getMessages()

        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all())->with(["failed" => "the message failed !!"]);
        } else {
            //insertion
            Message::create([
                "firstName" => $request->FirstName,
                "lastName" => $request->LastName,
                "email" => $request->Email,
                "phoneNumber" => $request->PhoneNumber,
                "message" => $request->Message
            ]);

            if(isset($request->Product)){
                $data = array(
                    "FirstName" => $request->FirstName,
                    "LastName" => $request->LastName,
                    "Email" => $request->Email,
                    "PhoneNumber" => $request->PhoneNumber,
                    "Message" => $request->Message,
                    "Product" => $request->Product,
                    "ProductRoute" => $request->ProductRoute,
                );
            }else{
                $data = array(
                    "FirstName" => $request->FirstName,
                    "LastName" => $request->LastName,
                    "Email" => $request->Email,
                    "PhoneNumber" => $request->PhoneNumber,
                    "Message" => $request->Message
                );
            }
            
/////////////////////
            Mail::to('info@maqais.com')->send(new ContactMail($data));

            return redirect()->back()->with(["success" => "the message sent successfully !!"]);
        }
    }
    protected function getMessages()
    {
        $masseges = [
            'FirstName.required' => 'The first name field is required.',
            'FirstName.max:15' => 'The first name may not be greater than :max characters.',
            'LastName.required' => 'The last name field is required.',
            'LastName.max:15' => 'The last name may not be greater than :max characters.',
            'Email.required' => 'The email field is required.',
            'Email.email' => 'The email must be a valid email address.',
            'PhoneNumber.required' => 'The phone number field is required.',
            'PhoneNumber.numeric' => 'The phone number field is should be numbers.',
            'Message.required' => 'The message text field is required.',
        ];
        return $masseges;
    }
    protected function getRules()
    {
        $rules = [
            'FirstName' => "required|max:15",
            'LastName' => "required|max:15",
            'Email' => "required|email",
            'PhoneNumber' => "required|numeric",
            'Message' => "required",
            'Captcha' => "required|captcha",
        ];
        return $rules;
    }
}
