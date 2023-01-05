<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'bail', //Thông báo ngay khi gặp lỗi
                'required', //Ko để trống
                'string', //Là 1 string
                'unique:App\Models\Category,name', // Là duy nhất
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Tên danh mục Không được để trống',
            'string' => ' Không chưa kí tự đặc biệt',
            'unique' => 'Đã tồn tại tên danh mục'
        ];
    }
}
