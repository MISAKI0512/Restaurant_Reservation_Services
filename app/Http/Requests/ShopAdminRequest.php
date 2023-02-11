<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopAdminRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'shop_master_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '※店舗名を入力してください',
            'description.required' => '※店舗紹介文を入力してください',
            'shop_master_name.required' => '※店舗責任者を入力してください',
        ];
    }
}
