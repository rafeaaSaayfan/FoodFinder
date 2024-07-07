<?php

namespace App\Http\Requests\Profile;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
        $user = User::find(auth()->user()->id);

        return [
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'first_name' => 'nullable|string|max:255|min:3',
            'last_name' => 'nullable|string|max:255|min:3',
            'username' => 'nullable|string|max:255|min:3',
            'email' => [
                'required',
                'email',
                'max:255',
                'min:3',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'phone_number'  => 'nullable|string|max:255|min:3',
            'address' => 'nullable|string|max:255|min:3|regex:/^https:\/\/maps\.app\.goo\.gl\/[a-zA-Z0-9]+$/',
        ];
    }
}
