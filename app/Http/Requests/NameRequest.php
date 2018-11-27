<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed name
 * @property mixed per_page
 * @property mixed page
 * @property mixed sorted
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
            'sorted' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Требуется указать название товара',
            'name.string' => 'Название товара должно быть строкой',
            'page.integer' => 'Номер страницы должен быть числом',
            'per_page.integer' => 'Количество элементов на страницу должно быть числом',
            'sorted.boolean' => 'Наличие сортировки должно быть булевым значением',
        ];
    }
}
