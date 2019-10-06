<?php

namespace App\Http\Controllers;

use App\Responsable;
use App\Departement;
use Illuminate\Http\Request;
use App\Http\Requests\ResponsableRequest;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('all')){
            $responsables=Responsable::all();
        }
        else{
            $responsables=Responsable::paginate(2);
        }
        return response()->json($responsables, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements=Departement::all();
        return view('responsables.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResponsableRequest $request)
    {
        $image = $request->get('nom').''.time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('responsables/images'), $image);
        $departement=Departement::find($request->get('departement_id'));
        $responsable=new Responsable(
            [
                'nom'=>$request->get('nom'),
                'prenom'=>$request->get('prenom'),
                'description'=>$request->get('description'),
                'image'=>$image,
            ]
        );
        $responsable->departement()->associate($departement);
        $responsable->save();
        return redirect('/responsable')->with('success', 'Responsable has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function show(Responsable $responsable)
    {
        return view('responsables.show', compact('responsable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit(Responsable $responsable)
    {
        $departements=Departement::all();
        return view('responsables.edit', compact(['responsable', 'departements']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function update(ResponsableRequest $request, Responsable $responsable)
    {
        $image = $request->get('nom').''.time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('responsables/images'), $image);
        $departement=Departement::find($request->get('departement_id'));
        $responsable->nom=$request->get('nom');
        $responsable->prenom=$request->get('prenom');
        $responsable->description=$request->get('description');
        $responsable->image=$image;
        $responsable->departement()->associate($departement);
        $responsable->save();
        return redirect('/responsable')->with('success', 'Responsable has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Responsable $responsable)
    {
        $responsable->delete();
        return redirect('/responsable')->with('success', 'Responsable has been removed');
    }
}
