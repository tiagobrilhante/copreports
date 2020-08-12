<?php

namespace App\Http\Requests\Resultados\Apreensoes;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => [
                'required',
            ],
            'cor' => [
                'required',
            ]

        ];
    }
}
