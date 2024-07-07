<?php

namespace App\Http\Requests\Restaurant_owner;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
        return [
            'name' => 'required|string|min:3|max:20',
            'price' => 'required|numeric|min:0',
            'category' => 'required|in:appetizers,sandwiches,meals,pizzas,desserts,drinks',
            'description' => 'required|string|min:3|max:40',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

}

