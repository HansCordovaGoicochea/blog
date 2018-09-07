<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
//        dd($this->route('usuario'));

//        validacion:tabla,campo,id_usuario
//        unique:users,email,'.$this->route('usuario')
        return [
            //
            'name' => 'required',
            'email' => 'email|required|unique:users,email,'.$this->route('usuario')
        ];
    }
}
