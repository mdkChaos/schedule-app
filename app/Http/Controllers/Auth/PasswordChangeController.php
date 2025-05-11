<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordChangeController extends Controller
{
    public function edit()
    {
        return view('auth.change-password');
    }

    public function update(UpdatePasswordRequest $request)
    {
        $validated = $request->validated();

        $user = Auth::user();
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('index')->with('status', __('message.changed_successfully'));
    }
}
