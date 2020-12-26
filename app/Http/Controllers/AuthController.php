<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return view('auth.login');
        }

        return redirect()->route('index');


    }

 
    public function inscription(Request $request){
        /* vars */
        $name = trim($request->get('nom'));
        $email = trim($request->get('email'));
        $password = $request->get('password');
        $departement = $request->get('departement');
        if (!$departement) {
            session()->flash('alerte', 'veuillez choisir un departement');
            session()->flash('type', 'error');
            return back()->withInput()->withErrors([
                'invalid-inscription' => 'veuillez choisir un departement valide.',
            ]);
        }
        dd($departement);
        /* vérifier l'email */
        $verif = User::where('email', $email)->first();
        if ($verif) {
            session()->flash('alerte', 'email déja utilisé veuillez réessayer');
            session()->flash('type', 'error');
            return back()->withInput()->withErrors([
                'invalid-inscription' => 'Un utilisateur existe déjà avec la même adresse mail.',
            ]);
        }
        /* création d'un compte */
        $client = new User();
        $client->nom = $name;
        $client->email = $email;
        $client->password = bcrypt($password);
        $client->departement=$departement;
        $saved = $client->save();
        if ($saved) {
            /* envoie du mail */
           
            auth()->attempt([
                'email' => $email,
                'password' => $password
            ]);
            session()->flash('alerte', 'Bienvenue ' . \Auth::user()->name);
            session()->flash('type', 'success');
            return redirect('/');
        }
            return redirect()->back();
    }
    public function verifUser(Request $request)
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication ok...
            session()->flash('alerte', 'bienvenue ' . \Auth::user()->name);
            session()->flash('type', 'success');

            return redirect('/');
        }
        session()->flash('alerte', 'identifiants incorrects');
        session()->flash('type', 'error');
        return back()->withInput()->withErrors([
            'invalid' => 'Vos identifiants sont incorrects.',
        ]);

    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}
