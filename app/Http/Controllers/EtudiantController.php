<?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
       /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $etablissements = Etudiant::orderBy('id','desc')->paginate(5);
        return view('etudiants.index', compact('etablissements'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('etudiants.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'preno' => 'required',
            'cin' => 'required',
            'nrInscription' => 'required',
        ]);
        
        Etudiant::create($request->post());

        return redirect()->route('etablissement.index')->with('success','student has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\etudiants  $etudiant
    * @return \Illuminate\Http\Response
    */
    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show',compact('etudiant'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Etudiant  $etudiant
    * @return \Illuminate\Http\Response
    */
    public function edit(Etudiant $etablissement)
    {
        return view('etudiants.edit',compact('etablissement'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\etudiant  $etudian
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Etudiant $etablissement)
    {
        $request->validate([

            'nom' => 'required',
            'preno' => 'required',
            'cin' => 'required',
            'nrInscription' => 'required',
        ]);
        
        $etablissement->fill($request->post())->save();

        return redirect()->route('etablissement.index')->with('success','student Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Etudiant  $etudiant
    * @return \Illuminate\Http\Response
    */
    public function destroy(Etudiant $etablissement)
    {
        $etablissement->delete();
        return redirect()->route('etablissement.index')->with('success','student has been deleted successfully');
    }
}
