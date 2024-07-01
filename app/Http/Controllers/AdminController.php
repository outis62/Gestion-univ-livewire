<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'handler-admin' || $user->role == 'agent-admin') {
            return view('back-office.pages.admins.index');
        } elseif ($user->role == 'handler-op' || $user->role == 'agent-op') {
            return view('front-office.pages.users.index');
        } else {
            abort(403, 'Accès interdit');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();

        if ($user->role == 'handler-admin' || $user->role == 'agent-admin') {
            $user = new User();
            return view('back-office.pages.admins.create', compact('user'));
        } elseif ($user->role == 'handler-op' || $user->role == 'agent-op') {
            $user = new User();
            return view('front-office.pages.users.create', compact('user'));
        } else {
            abort(403, 'Accès interdit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $currentUser = auth()->user();

        if ($currentUser->role == 'handler-admin' || $currentUser->role == 'agent-admin') {
            return view('back-office.pages.admins.show', compact('user'));
        } elseif ($currentUser->role == 'handler-op' || $currentUser->role == 'agent-op') {
            return view('front-office.pages.users.show', compact('user'));
        } else {
            abort(403, 'Accès interdit');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $currentUser = auth()->user();

        if ($currentUser->role == 'handler-admin' || $currentUser->role == 'agent-admin') {
            return view('back-office.pages.admins.edit', compact('user'));
        } elseif ($currentUser->role == 'handler-op' || $currentUser->role == 'agent-op') {
            return view('front-office.pages.users.edit', compact('user'));
        } else {
            abort(403, 'Accès interdit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Utilisateur supprimé.');
    }
}