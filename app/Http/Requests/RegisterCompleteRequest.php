<?php

namespace App\Http\Requests;

use App\Rules\VerifyWhatsappNumber;
use Illuminate\Foundation\Http\FormRequest;

class RegisterCompleteRequest extends FormRequest
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
            'mobile_code' => [],
            'mobile_number' => ['required', 'numeric'],
            'group' => ['required'],
            'whatsapp_code' => [],
            'whatsapp_number' => [new VerifyWhatsappNumber],
            'house_number' => ['required'],
            'street_details' => ['required'],
            'post_code' => ['required'],
            'ministry' => [],
        ];
    }
}
