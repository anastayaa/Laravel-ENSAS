<?php

namespace App\Http\Controllers;

use App\Filiere;
use App\Departement;
use App\Responsable;
use App\Coordinateur;
use Illuminate\Http\Request;
use App\Http\Requests\FiliereRequest;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filieres=Filiere::with(['departement', 'responsable', 'coordinateur'])->paginate(2);
        return response()->json($filieres, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements=Departement::all();
        $responsables=Responsable::all();
        $coordinateurs=Coordinateur::all();
        return view('filieres.create', compact(['departements', 'responsables', 'coordinateurs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        app('App\Http\Requests\FiliereRequest');
        $image = $request->get('titre').''.time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('filieres/images'), $image);
        $departement=Departement::find($request->get('departement_id'));
        $responsable=Responsable::find($request->get('responsable_id'));
        $coordinateur=Coordinateur::find($request->get('coordinateur_id'));
        $filiere=new Filiere(
            [
                'titre'=>$request->get('titre'),
                'image'=>'/filieres/images/'.$image
            ]
        );
        $filiere->departement()->associate($departement);
        $responsable->filiere()->save($filiere);
        $coordinateur->filiere()->save($filiere);
        return response()->json([
            'status' => (bool) $filiere,
            'data'   => $filiere,
            'message' => $filiere ? 'Filiere Created!' : 'Error Creating Filiere'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function show(Filiere $filiere)
    {
        $filiere=$filiere::with(['departement', 'responsable', 'coordinateur'])->find($filiere->id);
        return response()->json($filiere);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Filiere $filiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filiere $filiere)
    {
        app('App\Http\Requests\FiliereRequest');
        $image = $request->get('titre').''.time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('filieres/images'), $image);
        $departement=Departement::find($request->get('departement_id'));
        $responsable=Responsable::find($request->get('responsable_id'));
        $coordinateur=Coordinateur::find($request->get('coordinateur_id'));
        $filiere->titre=$request->get('titre');  
        $filiere->image='/departements/images/'.$image;
        $filiere->departement()->associate($departement);
        $responsable->filiere()->save($filiere);
        $coordinateur->filiere()->save($filiere);
        return response()->json([
            'status' => (bool) $filiere,
            'data'   => $filiere,
            'message' => $filiere ? 'Filiere Updated!' : 'Error Updating Filiere'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return response()->json('Successfully Deleted');
    }
}
