<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecursosFormRequest extends FormRequest
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

            // 'idrecurso'=>'required|max:120',
            'recurso'=>'required|max:11',
            'descripcion'=>'max:50',
            'tipo_recurso'=>'max:500',
            'costo'=>'max:11',
            'tipo_cobro'=>'max:11',
            // 'created_at',
            // 'updated_at',
            'users_id'=>'max:11',
            'idpago'=>'max:11',
        ];
    }
}


