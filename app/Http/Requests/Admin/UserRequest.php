<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name'     => ['required', 'string'],
            'email'    => ['required','email','unique:users,email'],
            'password' => ['required','confirmed'],
            'phone'    => ['required', 'numeric'],
            'photo'    => ['sometimes','nullable','image','mimes:png,jpg,jpeg,gif,bmp,webp,svg'],

        ];
        if ($this->method() == 'PUT') {
            $rules['name']      = ['string'];
            $rules['email']     = ['email'];
            $rules['password']  = ['nullable'];
            $rules['phone']     = ['numeric'];
        }
        return $rules;
    }
    }