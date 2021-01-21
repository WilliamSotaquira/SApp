<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'type_user'=>'required|max:45',
            'name'=>'required|max:120',
            'email'=>'required|max:120',
            'home_address'=>'required|max:120',
            'city'=>'required|max:45',
            'mobile'=>'required|max:45',
            'aux_contact'=>'max:45',
            'type_doc'=>'required|max:45',
            'document'=>'required|max:45',
            'score'=>'required|max:45',
            // 'remember_token'=>'required|max:100',
            // 'created_at'=>'required|max:45',
            // 'updated_at'=>'required|max:45',
        ];
    }
}
