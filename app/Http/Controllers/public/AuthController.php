<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function incriptionOption(){
        return view('public.auth.inscription-option');
    }

    public function incriptionPromoteur(){
        return view('public.auth.inscription-promoteur');
    }

    public function incriptionAbonne(){
        return view('public.auth.inscription-abonne');
    }

    public function connexion(){
        return view('public.auth.connexion');
    }
}
