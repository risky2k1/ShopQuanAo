<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'=>[
                'bail', //Thông báo ngay khi gặp lỗi
                'required', //Ko để trống
                'string', //Là 1 string
//                'unique:App\Models\Course,name', // Là duy nhất
            ],
            'sellPrice'=>[
                'required',
                'numeric',
            ],
            'importPrice'=>[
                'required',
                'numeric'
            ],
            'quantity'=>[
                'required',
                'numeric',
            ],
            'description'=>[
                'required',
                'string',
            ],
            'intro_img'=>[
                'string',
            ]
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute Can not be blank',

        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Ho ten',
        ];
    }
}
