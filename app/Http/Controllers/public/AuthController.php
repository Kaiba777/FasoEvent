<?php

namespace App\Http\Controllers\public;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function incriptionOption(){
        return view('public.auth.inscription-option');
    }

    /**
     * Affichage du formulaire d'inscription promoteur
     *
     * @return void
     */
    public function incriptionPromoteur(){
        return view('public.auth.inscription-promoteur');
    }


    public function incriptionPromoteurAction(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'nomcomplet' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'siege' => 'required',
                'activites' => 'required',
                'adresse' => 'required',
                'telephone' => 'required|min:8',
                'password' => 'required|min:8',
            ],
            [
                'nomcomplet.required' => 'Le champ nomcomplet est requis.',
                'email.required' => 'Le champ email est requis.',
                'email.email' => 'Veuillez entrer une adresse email valide.',
                'email.max' => 'L\'adresse email ne doit pas dépasser :max caractères.',
                'email.unique' => 'Cette adresse email est déjà utilisée.',
                'password.required' => 'Le champ mot de passe est requis.',
                'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
                'siege.required' => 'Le champ siege est requis.',
                'adresse.required' => 'Le champ adresse est requis.',
                'telephone.required' => 'Le champ telephone est requis.',
                'telephone.min' => 'Le numéro de telephone doit contenir au moins :min caractères.',
                'activites.required' => 'Le champ domaines d\'activites est requis.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $promoteur = User::create([
            'nomcomplet' => $request->nomcomplet,
            'email' => $request->email,
            'password' => $request->password,
            'siege' => $request->siege,
            'telephone' => $request->telephone,
            'activites' => $request->activites,
            'role' => 'promoteur',
            'status' => 'en_attente'
        ]);
        return redirect()->route('public.connexion')->with('success', 'Inscription reussi ! Veuillez vous connecter.');  
    }

    public function incriptionAbonne(){
        return view('public.auth.inscription-abonne');
    }

    public function connexion(){
        return view('public.auth.connexion');
    }
}
