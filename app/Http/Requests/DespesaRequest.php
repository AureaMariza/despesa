<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DespesaRequest extends FormRequest
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
            'descricao' => 'required|string|min:3|max:300',
            'data' => 'required|date',
            'anexo' => 'required|image|max:8192',
            'user_id' => 'required|exists:users,id',
            'valor' => 'required|numeric'
        ];
    }
}
