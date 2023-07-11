<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    public function rules(): array
    {
        $clienId = $this->route('client') ? $this->route('client')->id : null;

        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_no' => ["required", "string", Rule::unique('cients')->ignore($clienId)]
        ];
    }
}
