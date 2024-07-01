<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        switch ($profil->role) {
            case 'handler-admin':
            case 'agent-admin':
                $viewName = 'back-office.pages.administrateur.show';
                break;
            case 'handler-op':
            case 'agent-op':
                $viewName = 'front-office.pages.gestionnaire_op.show';
                break;
            case 'prospect':
                $viewName = 'web-site.pages.users.show';
                break;
            default:
                $viewName = 'front-office.pages.default.show';
                break;
        }
        return view($viewName, compact('profil'));
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
        $response = false;
        $authenticatedUserRole = auth()->user()->role;

        switch ($authenticatedUserRole) {
            case 'handler-admin':
            case 'agent-admin':
                $viewName = 'back-office.pages.administrateur.edit';
                break;
            case 'handler-op':
            case 'agent-op':
                $viewName = 'front-office.pages.gestionnaire_op.edit';
                break;
            case 'prospect':
                $viewName = 'web-site.pages.users.edit';
                break;
            default:
                $viewName = 'back-office.pages.default.edit';
                break;
        }

        // Return the view with the user data and response flag
        return view($viewName, compact('response', 'user'));
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
        $messages = [
            'nom.required' => 'Le champ nom est requis.',
            'prenom.required' => 'Le champ prenom est requis.',
            'adresse.required' => 'Le champ adresse est requis.',
        ];
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($id)],
            'operation_paysane_id' => 'nullable',
            'prospection_id' => 'nullable',
        ], $messages);

        $user = User::where('id', $id)->first();
        $user->update($request->except(['statut']));

        switch ($user->role) {
            case 'handler-admin':
            case 'agent-admin':
                $redirectRoute = 'admins.utilisateurs.edit';
                break;
            case 'handler-op':
            case 'agent-op':
                $redirectRoute = 'cooperatives.utilisateurs.edit';
                break;
            case 'prospect':
                $redirectRoute = 'prospect.utilisateurs.edit';
                break;
            default:
                $redirectRoute = 'home';
                break;
        }

        return redirect()->route($redirectRoute, ['utilisateur' => $user->id])->with('success', 'Utilisateur mise a jour avec succès !.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
