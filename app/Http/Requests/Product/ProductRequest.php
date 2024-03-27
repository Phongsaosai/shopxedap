<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'file' => 'required' // Sử dụng tên trường 'file' nếu đúng
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Không được để trống tên',
            'file.required' => 'Vui lòng thêm ảnh'
        ];
    }
}