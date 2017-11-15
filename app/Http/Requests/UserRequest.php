<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'PUT' : {
                $rules = [
                    'email' => 'required_if:tipoUsuario,1|string|email|max:255|nullable|unique:users,email,'.$this->user->id,
                    'password' => 'string|min:6|confirmed|nullable',
                    'tipoUsuario' => 'required',
                    'plan' => 'required_if:tipoUsuario,2',
                    'nombre' => 'required_if:tipoUsuario,1',
                    'apellidoPaterno' => 'required_if:tipoUsuario,1',
                    'apellidoMaterno' => 'required_if:tipoUsuario,1'
                ];
            }
            break;
            case 'POST' : {
                $rules = [
                    'email' => 'required_if:tipoUsuario,1|string|email|max:255|unique:users|nullable',
                    'password' => 'required|string|min:6|confirmed',
                    'tipoUsuario' => 'required',
                    'plan' => 'required_if:tipoUsuario,2',
                    'nombre' => 'required_if:tipoUsuario,1',
                    'apellidoPaterno' => 'required_if:tipoUsuario,1',
                    'apellidoMaterno' => 'required_if:tipoUsuario,1'
                ];
            }
            break;
        }
        return $rules;
    }
    public function messages()
    {
        return [
        ];
    }
}
