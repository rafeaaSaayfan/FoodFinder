<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Profile\ChangePassRequest;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
    public function changePass(ChangePassRequest $request) {
        $user = auth()->user();

        if (!Hash::check($request->old_pass, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'The old password is incorrect!',
            ]);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully!',
        ]);
    }
}
