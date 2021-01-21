<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectosFormRequest extends FormRequest
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
            // 'idproyecto'=>'requiered|max:11',
            'tipoProyecto'=>'requiered|max:11',
            'nombreProyecto'=>'requiered|max:45',
            'direccion'=>'requiered|max:45',
            'telContacto'=>'requiered|max:45',
            'ciudad'=>'requiered|max:45',
            'estadoProyecto'=>'requiered|max:11',
            'fechaPlano'=>'requiered|max:10',
            'fechaRectificacion'=>'requiered|max:10',
            'fechaEntrada'=>'requiered|max:10',
            'fechaCierre'=>'requiered|max:10',
            // 'created_at'=>'requiered|max:10',
            // 'updated_at'=>'requiered|max:10',
            'idcotizacion'=>'requiered|max:11',
        ];
    }
}
