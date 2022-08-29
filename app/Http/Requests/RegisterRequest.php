<?php

namespace App\Http\Requests;

use App\Rules\UniqueEmail;
use App\Rules\PasswordContainNumber;
use App\Rules\PasswordContainLowercase;
use App\Rules\PasswordContainUppercase;
use App\Rules\passwordContainSpaceBetween;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'surname' => ['required'],
            'firstname' => ['required'],
            'othername' => ['required'],
            'email' => ['required', 'email', new UniqueEmail],
            'password' => ['required', 'min:8', 'max:20', new PasswordContainUppercase, new PasswordContainLowercase, new PasswordContainNumber, new passwordContainSpaceBetween],
            'gender' => ['required'],
            'day' => ['required'],
            'month' => ['required'],
        ];
    }
}
