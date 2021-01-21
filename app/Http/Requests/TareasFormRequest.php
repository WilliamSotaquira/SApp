<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareasFormRequest extends FormRequest
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
            'idtarea'=>'required|max:11',
            'tarea'=>'required|max:50',
            'descripcion'=>'max:500',
            'duracion'=>'required|max:45',
            'tipo_tarea'=>'max:11',
            'estado_tarea'=>'max:45',
        // 'created_at'=>'max:11',
        // 'updated_at'=>'max:11',
            'idactividad'=>'max:11',
        ];
    }
}
