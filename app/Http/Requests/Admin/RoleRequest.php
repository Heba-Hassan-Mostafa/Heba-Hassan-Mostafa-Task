<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name'       => ['required','string','unique:roles,name'],
            'permission' => ['required'],
        ];
        if ($this->method() == 'PUT') {
            $rules['name']            = ['string'];
            $rules['permission']      = ['required'];

        }
        return $rules;
    }
    }