<?php

namespace App\Http\Controllers;

use App\Models\OperationPaysane;
use App\Models\Prospection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

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
        // dd($utilisateurs);
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
    public function create()
    {
        return view("front-office.pages.utilisateurs.create" , compact("user","organisation","utilisateurs"));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profil = User::find($id);
        return view('back-office.pages.administrateur.show', compact('profil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $operationPaysanes = OperationPaysane::all();
        $prospections = Prospection::all();
        $response = false;

        return view('back-office.pages.administrateur.edit', compact('response', 'user', 'operationPaysanes', 'prospections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $this->validate($request, [
                'nom' => 'required',
                'prenom' => 'nullable',
                'adresse' => 'nullable',
                'email' => ['required', Rule::unique('users')->ignore($id)],
                'operation_paysane_id' => 'nullable',
                'prospection_id' => 'nullable',
            ]);

            $user = User::where('id', $id)->first();
            //info
            $statut = false;
            if ($request->statut) {
                $statut = true;
            }

            // dd($request);

            $user->update(array_merge($request->all(), ['statut' => $statut]));
            // try {
            //     Mail::to('test@enabel.com')->send(new RegisterMail($user));
            //     $request->session()->flash('success','Utilisateur modifier, un mail lui a été envoyé.');
            //     return redirect()->back();
            // } catch (\Throwable $th) {
            //     $request->session()->flash('error',"Utilisateur modifier mais le mail n'a pas été envoyé.");
            //     return redirect()->back();
            // }
            return redirect()->back()->with('success', 'Utilisateur modifié.');

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
        return redirect()->back()->with('success', 'Utilisateur supprimé.');
    }
}