<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpruntRequest;
use App\Models\Emprunt;
use App\Models\Liver;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('emprunt.home', ['emprunts' => Emprunt::latest()->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emprunt.add', ['livres' => Liver::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpruntRequest $request)
    {
        $emprunt = Emprunt::create([
            ...$request->validated(),
            'date_emprunt' => date("Y-m-d")
        ]);
        return redirect()->route('emprunt.show', $emprunt)->with("pass", "Emprunt created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Emprunt $emprunt)
    {
        return view('emprunt.show', compact('emprunt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emprunt $emprunt)
    {
        return view('emprunt.modifier', compact('emprunt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpruntRequest $request, Emprunt $emprunt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprunt $emprunt)
    {
        $emprunt->delete();

        return redirect()->route('emprunt.index')->with('pass', "l'emprunt <b>$emprunt->id</b> est supprimer avec succee");
    }
}
