<?php

namespace App\Http\Controllers;

use App\Models\Tuteur;
use App\Http\Requests\StoreTuteurRequest;
use App\Http\Requests\UpdateTuteurRequest;

class TuteurController extends Controller
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
     * @param  \App\Http\Requests\StoreTuteurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTuteurRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function show(Tuteur $tuteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Tuteur $tuteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTuteurRequest  $request
     * @param  \App\Models\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTuteurRequest $request, Tuteur $tuteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tuteur $tuteur)
    {
        //
    }
}
