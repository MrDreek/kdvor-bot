<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed name
 * @property mixed per_page
 * @property mixed page
 */
class NameRequest extends FormRequest
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
            'name' => 'required|string',
            'page' => 'integer',
            'per_page' => 'integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Требуется указать название товара',
            'name.string' => 'Название товара должно быть строкой',
        ];
    }
}
