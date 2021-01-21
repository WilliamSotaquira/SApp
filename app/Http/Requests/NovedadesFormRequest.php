<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NovedadesFormRequest extends FormRequest
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

            // 'ideventos'=>'required|max:11',
            'tipoEvento'=>'required|max:11',
            'descripcion'=>'required|max:11',
            'estadoEvento'=>'required|max:11',
            // 'created_at'=>'required|max:11',
            // 'updated_at'=>'required|max:11',
            // 'idProyecto'=>'required|max:11',
        ];
    }
}
