<?php

namespace App\Http\Requests\Personal\Demand;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'fio' => 'required|string',
            'phone_number' => 'required|string',
            'location' => 'required|string',
            'email' => 'required|string|email',
            'suitable_time' => 'required',
            'captcha' => ['required', 'captcha'],
        ];
    }

    public function messages()
    {
        return [
            'fio.required' => 'Это поле необходимо для заполнения',
            'fio.string' => 'Данные должны соответствовать строчному типу',
            'phone_number.required' => 'Это поле необходимо для заполнения',
            'phone_number.string' => 'Данные должны соответствовать строчному типу',
            'location.required' => 'Это поле необходимо для заполнения',
            'location.string' => 'Данные должны соответствовать строчному типу',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Данные должны соответствовать строчному типу',
            'email.email' => 'Ваша почта должна соответствовать формату mail@some.domain',
            'suitable_time.required' => 'Это поле необходимо для заполнения',
            'captcha.required' => 'Это поле необходимо для заполнения',
            'captcha.captcha' => 'Заполните результат, который видите на картинке',
        ];
    }
}
