<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActividadesFormRequest extends FormRequest
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
            // 'idactividad'=>'required|max:11',
            'referencia'=>'required|max:45',
            'actividad'=>'required|max:50',
            'descripcion'=>'required|max:500',
            // 'created_at'=>'required|max:45',
            // 'updated_at'=>'required|max:45',
            // 'idrecurso'=>'required|max:11',
        ];
    }
}
