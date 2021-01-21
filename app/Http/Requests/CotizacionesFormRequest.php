<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CotizacionesFormRequest extends FormRequest
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
            // 'idcotizacion'=>'required|max:11',
            // 'subtotal'=>'required|max:11',
            // 'descuento'=>'required|max:11',
            // 'impuestoCotizacion'=>'required|max:11',
            // 'totalCotizacion'=>'required|max:11',
            'observaciones'=>'required|max:100',
            // 'estadoCotizacion'=>'required|max:10',
            // 'created_at'=>'required|max:11',
            // 'updated_at'=>'required|max:11',
            'idClientes'=>'required|max:10',
            'idUser'=>'required|max:10',
        ];
    }
}
