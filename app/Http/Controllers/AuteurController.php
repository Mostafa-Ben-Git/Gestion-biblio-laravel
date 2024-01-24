<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuteurRequest;
use App\Models\Auteur;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auteur.home', ['auteurs' => Auteur::latest()->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auteur.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuteurRequest $request)
    {
        $auteur = Auteur::create($request->validated());
        return redirect()->route('auteur.show', $auteur)->with("pass", "Auteur created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Auteur $auteur)
    {
        return view('auteur.show', compact('auteur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auteur $auteur)
    {
        return view('auteur.modifier', compact('auteur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuteurRequest $request, Auteur $auteur)
    {

        $auteur->update($request->validated());

        return redirect()->route('auteur.show', compact('auteur'))->with('pass', "L'Acteur a etait Modifie");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auteur $auteur)
    {
        $name = $auteur->fullName();

        $auteur->delete();
        return redirect()->route('auteur.index')->with('pass', "l'auteur <b>$name</b> supprimer aver succee");
    }
}
