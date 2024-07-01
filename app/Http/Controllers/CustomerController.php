<?php

namespace App\Http\Controllers;

use App\Models\OperationPaysane;
use App\Mail\Usercouriel;

use App\Models\Prospection;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $organisation = $user->operationPaysanes;
        $utilisateurs = $organisation->users;
        // dd( $user->operationPaysanes->id);
        // $user = Auth::user();

        // if ($user && $user->statut) {
        //     if (Gate::allows('isGestionnaire')) {
        //         return view('front-office.pages.dashboard');
        //     } else {
        //         abort(403, "Vous n'avez accès a cette page");
        //     }
        // } else {
        //     abort(403, "Votre compte n'est pas activé, veuillez contacter l'administrateur pour plus d'information.");
        // }
        return view("front-office.pages.utilisateurs.index" , compact("user","organisation","utilisateurs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $utilisateur)
    {
       
        
        return view("front-office.pages.utilisateurs.create", ["utilisateur"=> $utilisateur,"userid"=> null]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        // $organisation = $user->operationPaysanes
        $password = Str::random(6);
        $hashpassword = Hash::make($password);
        $agent_op = User::create([
               
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => $hashpassword,
            'operation_paysane_id' => $user->operationPaysanes->id,
            'role' => $request->role
        ]);
        $msg = "Bonjour";
        $messages = "votre compte à éte crée sur la plateforme et voici votre mot de passe: " . $password;
        Mail::to($agent_op->email)->send(new Usercouriel($agent_op, $messages, $msg));
        return redirect()->route('utilisateurs.index')->with('success', 'Creer avec success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show(User $utilisateur)
    {
        
        return view('front-office.pages.utilisateurs.create', ["utilisateur"=> $utilisateur,"userid"=> $utilisateur->id]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $utilisateur)
    {
       
        $user = Auth::user();
        $organisation = $user->operationPaysanes;
        $utilisateurs = $organisation->users;

        return view('front-office.pages.utilisateurs.edit', ["user"=>$user,"organisation"=> $organisation,"utilisateurs"=> $utilisateurs,"utilisateur"=>$utilisateur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $utilisateur)
    {
        {
            $user = Auth::user();
            // $organisation = $user->operationPaysanes
            $utilisateur->update([

                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'operation_paysane_id' => $user->operationPaysanes->id,
                'role' => $request->role
            ]);
     
            return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur modifié.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé.');
    }
}