<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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
            'extra_id' => 'unique:users|max:100',
            'avatar' => 'file',
            'name' => 'required|string|max:50|min:5',
            'username' => 'required|string|max:50|min:3',
            'email' => 'required|email|max:50|min:6',
            'password' => 'required|confirmed|min:6'
        ];
    }
}
