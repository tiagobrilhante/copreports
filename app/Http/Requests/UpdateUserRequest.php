<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'email' => [
                'required',
            ],
            'password' => [
                'required',
                'string',
                'min:6'
            ],
            'comando_conjunto_id' => [
                'required'
            ]

        ];
    }
}
