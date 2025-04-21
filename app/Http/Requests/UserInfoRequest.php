<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Constants\Prefecture;
use Illuminate\Validation\Rule;

class UserInfoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'last_name' => 'required|string|min:1|max:15',
            'first_name' => 'required|string|min:1|max:15',
            'tel' => 'required|regex:/^[0-9\-]+$/|min:10|max:13',
            'postal_code' => 'required|regex:/^\d{3}-?\d{4}$/',
            'pref' => ['required', 'string', Rule::in(Prefecture::LIST)], //🍀Rule::in(Prefecture::LIST)は「値がLIST(定義した都道府県)であること」
            'city' => 'required|string|max:50',
            'town' => 'required|regex:/^[一-龠ぁ-んァ-ンーa-zA-Z0-9\-]+$/u|max:50',
            'building' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            // last_name フィールド
            'last_name.required' => '姓は必須項目です。',
            'last_name.string' => '姓は文字列で入力してください。',
            'last_name.min' => '姓は1文字以上で入力してください。',
            'last_name.max' => '姓は15文字以内で入力してください。',

            // first_name フィールド
            'first_name.required' => '名前は必須項目です。',
            'first_name.string' => '名前は文字列で入力してください。',
            'first_name.min' => '名前は1文字以上で入力してください。',
            'first_name.max' => '名前は15文字以内で入力してください。',

            // tel フィールド
            'tel.required' => '電話番号は必須項目です。',
            'tel.regex' => '電話番号は数字とハイフンのみ使用してください。',
            'tel.min' => '電話番号は10文字以上で入力してください。',
            'tel.max' => '電話番号は13文字以内で入力してください。',

            // postal_code フィールド
            'postal_code.required' => '郵便番号は必須項目です。',
            'postal_code.regex' => '郵便番号は「123-4567」の形式で入力してください。',

            // pref フィールド
            'pref.required' => '都道府県は必須項目です。',
            'pref.string' => '都道府県は文字列で入力してください。',
            'pref.in' => '選択した都道府県が無効です。',

            // city フィールド
            'city.required' => '市区町村名は必須項目です。',
            'city.string' => '市区町村名は文字列で入力してください。',
            'city.max' => '市区町村名は50文字以内で入力してください。',

            // town フィールド
            'town.required' => '町名は必須項目です。',
            'town.regex' => '町名は正しい形式で入力してください（例: 漢字、ひらがな、カタカナ、英数字、またはハイフン）。',
            'town.max' => '町名は50文字以内で入力してください。'
        ];
    }
}

?>