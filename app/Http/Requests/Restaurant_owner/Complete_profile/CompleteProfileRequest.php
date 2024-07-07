<?php

namespace App\Http\Requests\Restaurant_owner\Complete_profile;

use App\Models\Restaurant;
use App\Models\RestaurantImage;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CompleteProfileRequest extends FormRequest
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
        $restaurant = Restaurant::where('owner_id', auth()->user()->id)->first();
        $restaurant_images = RestaurantImage::where('restaurant_id', $restaurant->id)->first();
        $rules = [];

        switch ($this->progress_step) {

            case 0:
                $rules = [
                    'restaurant_name' => 'required|string|max:255|min:3',
                    'restaurant_email' => [
                        'required',
                        'email',
                        'max:255',
                        'min:3',
                        Rule::unique('restaurants', 'restaurant_email')->ignore($restaurant->id),
                    ],
                    'restaurant_phone'  => 'required|string|max:255|min:3',
                    'description'  => 'required|string|max:255|min:3',
                ];

                break;

            case 1:
                $rules = [
                    'address' => 'required|string|max:255|min:3|regex:/^https:\/\/maps\.app\.goo\.gl\/[a-zA-Z0-9]+$/',
                ];
                break;

            case 2:
                $rules = [
                    'profile_image' => $restaurant_images->profile_image && !$this->hasFile('profile_image') ? 'nullable' : 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'detail_image_1' => $restaurant_images->detail_image_1 && !$this->hasFile('detail_image_1') ? 'nullable' : 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'detail_image_2' => $restaurant_images->detail_image_2 && !$this->hasFile('detail_image_2') ? 'nullable' : 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'detail_image_3' => $restaurant_images->detail_image_3 && !$this->hasFile('detail_image_3') ? 'nullable' : 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'detail_image_4' => $restaurant_images->detail_image_4 && !$this->hasFile('detail_image_4') ? 'nullable' : 'required|image|mimes:jpeg,png,jpg|max:2048',
                ];
                break;

            case 3:
                break;
            default:
                $rules = [];
                break;
        }

        return $rules;
    }
}
