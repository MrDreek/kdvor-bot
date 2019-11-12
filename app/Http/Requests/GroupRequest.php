<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed group
 * @property mixed per_page
 * @property mixed page
 * @property mixed sorted
 */
class GroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'group'     => 'required|string',
            'page'     => 'integer',
            'per_page' => 'integer',
            'sorted'   => 'boolean',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'group.required'    => 'Требуется указать название группы товаров',
            'group.string'      => 'Название группы товаров должно быть строкой',
            'page.integer'     => 'Номер страницы должен быть числом',
            'per_page.integer' => 'Количество элементов на страницу должно быть числом',
            'sorted.boolean'   => 'Наличие сортировки должно быть булевым значением',
        ];
    }
}
