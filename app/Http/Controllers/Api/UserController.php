<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Util\ApiResponse;
use App\Util\FileHandling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use ApiResponse;
    use FileHandling;

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => ['required', 'image'],
        ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {

            $existingImage = $user->originalImage;

            $filename = $this->uploadObject(config('apppend.storage.users'), $request->file('image'));
            $user->image = $filename;
            if ($user->save()) {

                if ($existingImage) {
                    $this->deleteObject($existingImage);
                }

                return UserResource::make($user);
            }
        }

        return $this->respondBad([
            'data' => [],
            'message' => __('app.Failed to upload image!'),
        ]);
    }
}
