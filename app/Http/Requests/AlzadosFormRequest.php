<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlzadosFormRequest extends FormRequest
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
            'idalzados'=>'required|max:11',
            'observaciones'=>'required|max:45',
            // 'created_at'=>'required|max:11',
            // 'updated_at'=>'required|max:11',
            'idProyecto'=>'required|max:11',
        ];
    }
}
