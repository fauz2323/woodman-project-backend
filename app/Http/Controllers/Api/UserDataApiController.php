<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserDataApiController extends Controller
{
    function getAddress()
    {
        $userAddress = UserAddress::where('user_id', auth()->id())->first();

        if (!$userAddress) {
            return response()->json(['message' => 'No address found'], 404);
        }

        return response()->json([
            'name' => $userAddress->name,
            'phone' => $userAddress->phone,
            'address' => $userAddress->address,
            'city' => $userAddress->city,
            'country' => $userAddress->country,
            'postal_code' => $userAddress->postal_code,
        ]);
    }

    function setAddress(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:20',
        ]);


        $userAddress = UserAddress::updateOrCreate(
            ['user_id' => auth()->id()],
            $request->only(['name', 'phone', 'address', 'city', 'country', 'postal_code'])
        );

        return response()->json([
            'name' => $userAddress->name,
            'phone' => $userAddress->phone,
            'address' => $userAddress->address,
            'city' => $userAddress->city,
            'country' => $userAddress->country,
            'postal_code' => $userAddress->postal_code,
        ]);
    }

    function editPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8',
        ]);

        $user = User::find(auth()->id());
        if (!$user || !Hash::check($request->old_password, $user->password)) {
            // If the user is not found or the old password does not match
            return response()->json(['message' => 'Old password is incorrect'], 401);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return response()->json(['message' => 'Password updated successfully']);
    }
}
