<?php

namespace App\Http\Controllers\Restaurant_owner\Complete_profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant_owner\Complete_profile\CompleteProfileRequest;
use App\Models\Restaurant;
use App\Models\RestaurantImage;
use App\Models\User;

class CompleteProfileController extends Controller
{
    public function viewPage() {
        $user = User::find(auth()->user()->id);

        if($user->role == 'restaurant_owner' && $user->profile_completed == 0) {
            $restaurant = Restaurant::where('owner_id', auth()->user()->id)->first();
            $restaurant_images = RestaurantImage::where('restaurant_id', $restaurant->id)->first();

            return view('restaurant_owner.complete_profile.complete_profile', [
                'user' => $user,
                'restaurant' => $restaurant,
                'restaurant_images' => $restaurant_images
            ]);
        } else {
            return view('404');
        }
    }

    public function complete_profile(CompleteProfileRequest $request) {
        $user = auth()->user();
        $restaurant = Restaurant::where('owner_id', auth()->user()->id)->first();
        $restaurant_images = RestaurantImage::where('restaurant_id', $restaurant->id)->first();

        switch ($request->progress_step) {
            case 0:
                $restaurant->restaurant_name = $request->restaurant_name;
                $restaurant->restaurant_email = $request->restaurant_email;
                $restaurant->restaurant_phone = $request->restaurant_phone;
                $restaurant->description = $request->description;
                $restaurant->save();

                $user->profile_progress_step = 1;
                $user->save();

                return response()->json([
                    'success' => true,
                    'message' => 'completed'
                ]);
                break;

            case 1:
                $restaurant->address = $request->address;
                $restaurant->save();

                $user->profile_progress_step = 2;
                $user->save();

                return response()->json([
                    'success' => true,
                    'message' => 'completed'
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

                $user->profile_progress_step = 3;
                $user->save();

                return response()->json([
                    'success' => true,
                    'message' => 'completed'
                ]);
                break;
            case 3:
                $user->profile_progress_step = 4;
                $user->profile_completed = 1;
                $user->save();

                return response()->json([
                    'success' => true,
                    'message' => 'completed',
                    'redirect_url' => '/home'
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
