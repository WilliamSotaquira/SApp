<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class contactoFormRequest extends FormRequest
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

            // 'idcontacto'=>'required|max:45',
            'idorganizacion'=>'required',
            'clientes_id'=>'required',
            'observaciones'=>'max:500',
            // 'created_at'=>'required|max:45',
            // 'updated_at'=>'required|max:45',
        ];
    }
}
