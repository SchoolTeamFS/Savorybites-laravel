<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Utilisateur;
use Carbon\Carbon;


class ManagerController extends Controller
{

    public function index(Request $request)
{
    $query = User::with('utilisateur.role');

    if ($request->has('search')) {
        $search = $request->input('search');

        $query->where(function ($q) use ($search) {
            $q->whereHas('utilisateur', function ($subQuery) use ($search) {
                $subQuery->where('username', 'like', "%{$search}%")
                        ->orWhereHas('role', function ($roleQuery) use ($search) {
                            $roleQuery->where('name', 'like', "%{$search}%");
                        });
            })->orWhere('email', 'like', "%{$search}%");
        });
    }

    $users = $query->get();

    if ($request->ajax()) {
        return response()->json([
            'html' => view('layouts.users-table', compact('users'))->render()
        ]);
    }

    return view('layouts.manager', compact('users'));
}

        public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('layouts.updateUser', compact('user'));
    }

    public function create()
    {
        $users = User::with('utilisateur')->get();
        return view('layouts.addUser', compact('users'));
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'min:8'],
            'role' => ['required']
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password,
        ]);
    
        Utilisateur::create([
            'user_id' => $user->id,
            'username' => $request->name, 
            'image' => null, 
            'bio' => null, 
            'joined_date' => Carbon::now(),
            'role_id' => $request->role, 
        ]);
    
        return redirect()->route('manage-users')->with('status', 'profile-updated');
    }
    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->utilisateur) {
            $user->utilisateur->update([
                'role_id' => $request->input('role_id') ?? $user->utilisateur->role_id,
            ]);
        }

        return redirect()->route('manage-users')->with('status', 'profile-updated');
    }

    

    /**
     * Delete the user's account.
     */
    public function destroy( $id)
    {
        $user = User::findOrFail($id);

        if ($user->utilisateur) {
            $user->utilisateur->delete();
        }

        $user->delete();

        return redirect()->route('manage-users')->with('status', 'profile-deleted');
    }
}
