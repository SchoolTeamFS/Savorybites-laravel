<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Save changes to the User model
        $user->save();

        // Update the related Utilisateur model if necessary
        if ($user->utilisateur) {
            $user->utilisateur->update([
                'username' => $request->input('name') ?? $user->utilisateur->username,
                'bio' => $request->input('bio') ?? $user->utilisateur->bio,
                'image' => $this->handleImageUpload($request) ?? $user->utilisateur->image,
            ]);
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    private function handleImageUpload(Request $request)
    {
        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = $file->getClientOriginalName();
            $filePath = $file->storeAs('images/UserImages', $filename, 'public');
            return $filePath;
        }

        return null;
    }

    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        if ($user->utilisateur) {
            $user->utilisateur->delete();
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}
