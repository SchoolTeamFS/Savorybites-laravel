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
        $utilisateur = Auth::user()->utilisateur;

        // Si aucun profil Utilisateur n'est trouvé, retourner une erreur 403
        if (!$utilisateur) {
            abort(403, 'Accès refusé. Profil utilisateur non trouvé.');
        }

        // Vérifier si l'utilisateur est admin (role_id === 1)
        $isAdmin = $utilisateur->role_id === 1;

        // Passer l'utilisateur et le statut d'admin à la vue du tableau de bord
        return view('dashboard', compact('utilisateur', 'isAdmin'));
    }
}

