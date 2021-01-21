<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleCotizacionesFormRequest extends FormRequest
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

            // 'iddetalle'=>'max:11',
            'idcotizacion'=>'required|max:11',
            'idactividad'=>'required|max:11',
            'descripcion'=>'max:500',
            'cantidad'=>'required|max:45',
            'descuento'=>'max:45',
            'valor_unidad'=>'required|max:45',
            'valor_total'=>'required|max:45',
            // 'created_at'=>'required',
            // 'updated_at'=>'required',   

        ];
    }
}
