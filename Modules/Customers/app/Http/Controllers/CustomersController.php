<?php

namespace Modules\Customers\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Modules\Customers\Models\Customer;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customers::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //Cette fonction s'exécute aprés la fonction verify_code ci dessous
    public function store(Request $request)
    {
        //Vérification du format du code envoyé par l'utilisateur
        $request->validate([
            'code' => 'required|numeric'
        ]);

        //Une fois le bon format, stockage du contenu de la session('pending_user) dans la variable pending
        $pending = session('pending_user');

        if (!$pending) {
            return view('customers.register.create')->with('error', 'Aucune inscription en cours.');
        }

        if ($request->code != $pending['verification_code']) {
            return back()->with('error', 'Code incorrect. Veuillez renvoyer le code exact');
        }

        // Création de l’utilisateur
        $user = User::create([
            'username' => $pending['username'],
            'password' => $pending['password'],
        ]);

        $user->assignRole('customer');

        // Création du client
        $customer = Customer::create([
            'user_id' => $user->id,
            'name' => $pending['name'],
            'surname' => $pending['surname'],
            'email' => $pending['email'],
            'phone' => $pending['phone'],
            'coordonnates_gps' => $pending['coordonnates_gps'],
            'account_balance' => $pending['account_balance'],
            'credit_limit' => $pending['credit_limit'],
            'slug' => Str::slug(trim($pending['name'] . ' ' . ($pending['surname'] ?? '')))
        ]);



        // Auto login
        Auth::login($user);

        // Nettoyage session
        session()->forget('pending_user');

        return redirect()->route('customers.index')->with('success', 'Inscription réussie !');
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('customers::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('customers::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}

    public function verify_code(Request $request)
    {
        //Validation des données envoyées par le client 
        $validated = $request->validate([
            "username" => "required|string|min:2|max:100",
            "name" => "required|string|min:2|max:100",
            "surname" => "nullable|string|min:2|max:100",
            "email" => "required|string|email|min:2|max:100|unique:customers,email",
            "phone" => "required|string|min:8|max:20",
            "coordonnates_gps" => "required|string|min:5|max:1000",
            "account_balance" => "required|numeric",
            "credit_limit" => "required|numeric",
            "password" => "required|string|confirmed"
        ]);

        //Génération du code à envoyer à le client pour valisation d'email
        $verification_code = rand(100000, 999999);

        // Stockage temporaire des données validées et du code de vérification en attente de de la vérification
        session([
            'pending_user' => array_merge($validated, [
                'verification_code' => $verification_code
            ])
        ]);

        // Envoi du mail contenant le code(Structure du mail dans app/mail/verificationCodeMail)
        Mail::to($validated['email'])->send(new VerificationCodeMail($verification_code));

        //Redirection
        return redirect()->route('customers.register.code')->with('success', 'Veuilez saisir le code qui vous a été envoyé à votre adresse email.');
    }


    //Fonction affichant le formulaire de saisie du code envoyé
    public function show_register_code_form()
    {
        return view('emails.register_code');
    }
}
