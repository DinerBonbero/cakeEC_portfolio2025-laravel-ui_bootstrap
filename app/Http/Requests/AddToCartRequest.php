<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
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
            'item_Quantity' => 'required|numeric|min:1|max:10',
        ];
    }

    public function messages(): array
    {
        return [
            'item_Quantity.required' => '数量は必須項目です。',
            'item_Quantity.max'      => '数量は最大10以内で入力してください。',
            'item_Quantity.min' => '数量は最小1以上で入力してください。',
            'item_Quantity.numeric' => '半角数値を入力してください。'
        ];
    }
}
