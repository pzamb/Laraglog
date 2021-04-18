<?php

namespace App\Http\Controllers\api;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactPost;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\api\ApiResponseController;

class ContactController extends ApiResponseController
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), StoreContactPost::myRules());
        if($validator->fails()){
            return $this->errorResponse($validator->errors());
        }
        else{
            $contact = Contact::create($validator->validated());
            return $this->successResponse($contact);
        }
    }
}
