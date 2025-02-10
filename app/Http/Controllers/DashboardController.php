<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Affiche le tableau de bord de l'utilisateur authentifié.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        // Récupérer l'utilisateur connecté avec son profil 'Utilisateur' et son rôle
        $user = Auth::user()->utilisateur()->first();
        // Si aucun profil Utilisateur n'est trouvé, retourner une erreur 403
        if (!$user) {
            abort(403, 'Accès refusé. Profil utilisateur non trouvé.');
        }

        // Passer l'utilisateur à la vue du tableau de bord
        return view('layouts.navigation', compact('user'));
    }
}
