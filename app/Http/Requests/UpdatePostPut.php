<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostPut extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /*
    public function messages(){
        return [
            'title.required' => __('messages.titlepost')
        ];
    }

    */

    public function attributes(){
        return [
            'title' => 'Título de mi post'
        ];
    }

    public function rules()
    {
        return[
            'title' => 'required|min:5|max:500',
            'url_clean' => 'max:500',
            'content' => 'required|min:5',
            'category_id' =>'required',
            'posted' =>'required',
            'tags_id' => 'required'
        ];
    }
}
