<?php

namespace App\Http\Controllers;

use App\Prof;
use App\Departement;
use Illuminate\Http\Request;
use App\Http\Requests\ProfRequest;

class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profs=Prof::paginate(2);
        return view('profs.index', compact('profs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements=Departement::all();
        return view('profs.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfRequest $request)
    {
        $image = $request->get('nom').''.time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('profs/images'), $image);
        $departement=Departement::find($request->get('departement_id'));
        $prof=new Prof(
            [
                'nom'=>$request->get('nom'),
                'prenom'=>$request->get('prenom'),
                'description'=>$request->get('description'),
                'image'=>$image,
            ]
        );
        $prof->departement()->associate($departement);
        $prof->save();
        return redirect('/prof')->with('success', 'Prof has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prof  $prof
     * @return \Illuminate\Http\Response
     */
    public function show(Prof $prof)
    {
        return view('profs.show', compact('prof'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prof  $prof
     * @return \Illuminate\Http\Response
     */
    public function edit(Prof $prof)
    {
        $departements=Departement::all();
        return view('profs.edit', compact(['prof', 'departements']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prof  $prof
     * @return \Illuminate\Http\Response
     */
    public function update(ProfRequest $request, Prof $prof)
    {
        $image = $request->get('nom').''.time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('profs/images'), $image);
        $departement=Departement::find($request->get('departement_id'));
        $prof->nom=$request->get('nom');
        $prof->prenom=$request->get('prenom');
        $prof->description=$request->get('description');
        $prof->image=$image;
        $prof->departement()->associate($departement);
        $prof->save();
        return redirect('/prof')->with('success', 'Departement has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prof  $prof
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prof $prof)
    {
        $prof->delete();
        //return redirect('/prof')->with('success', 'Prof has been removed');
        return response(['msg' => 'Prof deleted', 'status' => 'success']);
    }
}
