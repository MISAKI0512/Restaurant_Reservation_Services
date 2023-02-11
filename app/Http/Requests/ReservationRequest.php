<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'num_of_users' => 'required',
            'date' => 'required|after:today',
            'time' => 'required',
            'course_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'num_of_users.required' => '※人数を入力してください',
            'date.required' => '※日付を選択してください',
            'date.after' => '※翌日以降を選択してください',
            'time.required' => '※時間を選択してください',
            'course_id.required' => '※コースを選択してください'
        ];
    }
}
