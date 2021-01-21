<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriasFormRequest extends FormRequest
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
            // 'idcategoria'=>'requiered|max:10',
            'categoria'=>'requiered|max:45',
            // 'created_at'=>'requiered|max:10',
            // 'updated_at'=>'requiered|max:10',
        ];
    }
}
