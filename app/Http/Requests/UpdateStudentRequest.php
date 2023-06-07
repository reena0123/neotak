<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
        $studentId = $this->route('student');

        return [
             "first_name" => ["required","min:3","max:255"],
            "last_name" => ["required","min:3","max:255"],
            "phone" => ["required","numeric", "digits:10"],
            'email' => [
                'required',
                'email',
                Rule::unique('students')->ignore($studentId),
            ],
            "country" => ["required"],
            "state" => ["required"],
            "city" => ["required"]
        ];
    }
}
