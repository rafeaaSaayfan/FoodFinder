<?php

namespace App\Http\Controllers\Restaurant_owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant_owner\Complete_profile\CompleteProfileRequest;
use App\Models\Restaurant;
use App\Models\RestaurantImage;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function getAllSettings() {
        $settings = Restaurant::where('owner_id', auth()->user()->id)
        ->with('restaurant_images')
        ->first();

        return response()->json([
            'success' => true,
            'data' => $settings,
        ]);
    }

    public function update(CompleteProfileRequest $request) {
        $restaurant = Restaurant::where('owner_id', auth()->user()->id)->first();
        $restaurant_images = RestaurantImage::where('restaurant_id', $restaurant->id)->first();

        switch ($request->progress_step) {
            case 0:
                $restaurant->restaurant_name = $request->restaurant_name;
                $restaurant->restaurant_email = $request->restaurant_email;
                $restaurant->restaurant_phone = $request->restaurant_phone;
                $restaurant->description = $request->description;
                $restaurant->save();

                return response()->json([
                    'success' => true,
                    'message' => 'updated successfuly',
                ]);
                break;

            case 1:
                $restaurant->address = $request->address;
                $restaurant->save();

                return response()->json([
                    'success' => true,
                    'message' => 'updated successfuly',
                ]);
                break;
            case 2:
                if ($request->hasFile('profile_image')) {
                    $restaurant_images->profile_image = $this->storeImage($request->file('profile_image'));
                }

                for ($i = 1; $i <= 4; $i++) {
                    if ($request->hasFile('detail_image_' . $i)) {
                        $imageField = 'detail_image_' . $i;
                        $restaurant_images->$imageField = $this->storeImage($request->file('detail_image_' . $i));
                    }
                }

                $restaurant_images->save();

                return response()->json([
                    'success' => true,
                    'message' => 'updated successfuly',
                ]);
                break;
            default:
                break;
        }
    }

    private function storeImage($file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = time() . rand(1, 10000) . "." . $extension;
        $file->move(public_path('uploads/restaurant_images'), $filename);

        return $filename;
    }
}
