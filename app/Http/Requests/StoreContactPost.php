<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactPost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public static function myRules() 
    {
        //'title' => 'required|min:5|max:500',
        return[
            'name' => 'required',
            'surname' => 'required',
            'email' =>'required|email',
            'message' => 'required',
            'phone' => 'required'
        ];
    }
    
    public function rules()
    {
        return $this->myRules();
    }
}
