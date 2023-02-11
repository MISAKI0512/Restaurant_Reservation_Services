<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRegisterRequest extends FormRequest
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
            'name' => 'required|max:191',
            'shop_master_name' => 'required|max:191',
            'email' => 'required|email|unique:users,email|max:191',
            'password' => 'required|min:8|max:191',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '※店舗名を入力してください',
            'name.max' => '※191文字以内で入力してください',
            'shop_master_name.required' => '※店舗責任者を入力してください',
            'shop_master_name.max' => '※191文字以内で入力してください',
            'email.required' => '※メールアドレスを入力してください',
            'email.email' => '※メールアドレスの形式で入力してください',
            'email.unique' => '※このメールアドレスは既に登録済みです',
            'email.max' => '※191文字以内で入力してください',
            'password.required' => '※パスワードを入力してください',
            'password.min' => '※8文字以上で入力してください',
            'password.max' => '※191文字以内で入力してください',
        ];
    }
}
