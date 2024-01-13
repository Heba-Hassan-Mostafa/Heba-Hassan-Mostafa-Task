<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
       return [
            'name'     => ['required', 'string'],
            'email'    => ['email'],
            'phone'    => ['required', 'numeric'],
            'photo'    => ['sometimes','nullable','image','mimes:png,jpg,jpeg,gif,bmp,webp,svg'],

       ];
    }
    }