<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\Gender;

class AppealPostRequest extends FormRequest
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
    public static function rules()
    {
        return [
            'phone' => ['required_without:email', 'nullable', 'regex:/^([\+7|7|8]{1,2})\(\d{3}\) \d{3}-\d{2}-\d{2}$/', 'string'],
            'name' => 'required|min:2|max:20|string',
            'surname' => 'required|min:2|max:40|string',
            'patronymic' => 'nullable|min:5|max:20|string',
            'age' => 'required|between: 14, 120|integer',
            'email' => 'required_without:phone|nullable|regex:/^.+@.+$/|max:100|string',
            'message' => 'required|max:100|string',
            'gender' => ['required', Rule::in([Gender::MALE, Gender::FEMALE])]
        ];
    }
}
