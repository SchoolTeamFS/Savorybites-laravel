<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Validation\Rule; // <-- Add this line

class ManagerController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('layouts.manager', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('layouts.updateUser', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $rules = [
        'name' => 'required|string|max:255',
    ];

    if ($request->input('email') !== $user->email) {
        $rules['email'] = 'required|email|max:255|unique:users,email,' . $user->id;
    }

    $validated = $request->validate($rules);

    $user->update($validated);

    if ($user->utilisateur) {
        $user->utilisateur->update([
            'username' => $request->input('username') ?? $user->utilisateur->username,
            'bio' => $request->input('bio') ?? $user->utilisateur->bio,
            'role_id' => $request->input('role') ?? $user->utilisateur->role_id,
        ]);
    }

    return redirect()->route('manage-users')->with('status', 'profile-updated');
}

    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request, $id): RedirectResponse
    {
        

        $user = User::findOrFail($id);

        if ($user->utilisateur) {
            $user->utilisateur->delete();
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('manage-users');
    }
}
