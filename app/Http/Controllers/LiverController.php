<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Liver;
use Illuminate\Http\Request;

class LiverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('liver.home', ['livres' => Liver::latest()->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('liver.add', ["auteurs" => Auteur::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "titre" => 'string|max:100|min:5|required',
            "nbr_page" => "integer|required",
            'année_de_publication' => 'date|required',
            'auteur_id' => 'exists:auteurs,id|required'
        ]);

        $livre = Liver::create($data);
        return redirect()->route('liver.show', $livre)->with("pass", "Livre created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Liver $liver)
    {
        return view('liver.show', ['livre' => $liver]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Liver $liver)
    {
        return view('liver.modifier', ['livre' => $liver]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Liver $liver)
    {
        $data = $request->validate([
            "titre" => 'string|max:100|min:5|required',
            "nbr_page" => "integer|required",
            'année_de_publication' => 'date|required'
        ]);

        $liver->update($data);

        return redirect()->route('liver.show', ['liver' => $liver])->with("pass", "Le livre a etait Modifie");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Liver $liver)
    {
        $nom_livre = $liver->titre;
        $liver->delete();

        return redirect()->route('liver.index')->with("pass", "le livre <b>$nom_livre</b> supprimer aver succee ");
    }
}
