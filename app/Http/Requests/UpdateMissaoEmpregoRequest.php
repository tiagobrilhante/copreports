<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMissaoEmpregoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'missao' => [
                'required',
            ],
            'cor' => [
                'required',
            ]

        ];
    }
}
