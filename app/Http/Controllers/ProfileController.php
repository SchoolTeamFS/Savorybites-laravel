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
                'username' => $request->input('username') ?? $user->utilisateur->username,
                'bio' => $request->input('bio') ?? $user->utilisateur->bio,
                'image' => $this->handleImageUpload($request) ?? $user->utilisateur->image,
            ]);
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    // Handle image upload
    protected function handleImageUpload($request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profile_images', 'public');
            return $path;
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
