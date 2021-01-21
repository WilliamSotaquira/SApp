<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'id'=>'required|max:10',
            'name'=>'required|max:120',
            'last_name'=>'required|max:250',
            'email'=>'max:120',
            'home_address'=>'max:120',
            'mobile'=>'max:45',
            'phone'=>'max:45',
            'type_doc'=>'max:45',
            'document'=>'max:45',
            'score'=>'max:45',
            // 'remember_token'=>'max:100',
            // 'created_at'=>'max:50',
            // 'updated_at'=>'max:50',
        ];
    }
}
