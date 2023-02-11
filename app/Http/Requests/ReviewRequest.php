<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'star' => 'required',
            'comment' => 'required|max:191',
        ];
    }

    public function messages()
    {
        return [
            'star.required' => '※評価は1以上でお願いいたします',
            'comment.required' => '※コメントを入力してください',
            'comment.max' => '※191文字以内で入力してください',
        ];
    }
}
