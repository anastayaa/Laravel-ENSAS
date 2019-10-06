<?php

namespace App\Http\Controllers;

use App\Coordinateur;
use App\Departement;
use Illuminate\Http\Request;
use App\Http\Requests\CoordinateurRequest;

class CoordinateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('all')){
            $coordinateurs=Coordinateur::all();
        }
        else{
            $coordinateurs=Coordinateur::paginate(2);
        }
        return response()->json($coordinateurs, 200);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements=Departement::all();
        return view('coordinateurs.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoordinateurRequest $request)
    {
        $image = $request->get('nom').''.time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('coordinateurs/images'), $image);
        $departement=Departement::find($request->get('departement_id'));
        $coordinateur=new Coordinateur(
            [
                'nom'=>$request->get('nom'),
                'prenom'=>$request->get('prenom'),
                'description'=>$request->get('description'),
                'image'=>$image,
            ]
        );
        $coordinateur->departement()->associate($departement);
        $coordinateur->save();
        return redirect('/coordinateur')->with('success', 'Coordinateur has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coordinateur  $coordinateur
     * @return \Illuminate\Http\Response
     */
    public function show(Coordinateur $coordinateur)
    {
        return view('coordinateurs.show', compact('coordinateur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coordinateur  $coordinateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Coordinateur $coordinateur)
    {
        $departements=Departement::all();
        return view('coordinateurs.edit', compact(['coordinateur', 'departements']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coordinateur  $coordinateur
     * @return \Illuminate\Http\Response
     */
    public function update(CoordinateurRequest $request, Coordinateur $coordinateur)
    {
        $image = $request->get('nom').''.time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('coordinateurs/images'), $image);
        $departement=Departement::find($request->get('departement_id'));
        $coordinateur->nom=$request->get('nom');
        $coordinateur->prenom=$request->get('prenom');
        $coordinateur->description=$request->get('description');
        $coordinateur->image=$image;
        $coordinateur->departement()->associate($departement);
        $coordinateur->save();
        return redirect('/coordinateur')->with('success', 'Coordinateur has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coordinateur  $coordinateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coordinateur $coordinateur)
    {
        $coordinateur->delete();
        return redirect('/coordinateur')->with('success', 'Coordinateur has been removed');
    }
}
