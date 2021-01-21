<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class organizacionFormRequest extends FormRequest
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
                 //`idorganizacion`,
                `organizacion`=>'required|max:45',
                `nit`=>'required|max:45',
                `telefono_uno`=>'required|max:45',
                `telefono_dos`=>'max:45',
                `conmutador`=>'max:45',
                `email`=>'max:45',
                //`created_at`=>'max:13',
                //`updated_at`=>'max:13',
        ];
    }
}
