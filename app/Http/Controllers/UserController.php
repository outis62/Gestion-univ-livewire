<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        try {
            if ($user && $user->statut) {
                if (Gate::allows('isGestionnaire')) {
                    return view('front-office.pages.dashboard');
                } elseif (Gate::allows('isAdmin')) {
                    return view('back-office.pages.dashboard');
                } else {
                    Gate::authorize('accessPage');
                    return view('front-office.pages.dashboard');
                }
            } else {
                abort(403, "Votre compte n'est pas activé, veuillez contacter l'administrateur pour plus d'information.");
            }
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            abort(403, "Vous n'avez pas accès à cette page");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('web-site.pages.users.create', compact('user'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function updateStatus($id)
    {
        $user = User::findOrFail($id);

        if ($user->statut == 1) {
            $user->statut = 0;
        } else {
            $user->statut = 1;
        }

        $user->save();

        return redirect()->back();
    }
    public function loginPage()
    {
        return view('auth.login');
    }

}
