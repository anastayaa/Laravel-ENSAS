<?php

namespace App\Http\Controllers;

use App\Departement;
use Illuminate\Http\Request;
use App\Http\Requests\DepartementRequest;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('all')){
            $departements=Departement::all();
        }
        else{
            $departements=Departement::paginate(2);
        }
        return response()->json($departements, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        app('App\Http\Requests\DepartementRequest');
        $image = $request->get('titre').''.time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('departements/images'), $image);

        $departement=new Departement(
            [
                'titre'=>$request->get('titre'),
                'image'=>'/departements/images/'.$image
            ]
        );
        $departement->save();
        return response()->json([
            'status' => (bool) $departement,
            'data'   => $departement,
            'message' => $departement ? 'Departement Created!' : 'Error Creating Departement'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        return response()->json($departement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
        return view('departements.edit', compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departement $departement)
    {
        //app('App\Http\Requests\DepartementRequest');
        $image = $request->get('titre').''.time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('departements/images'), $image);
        $departement->titre=$request->get('titre');  
        $departement->image='/departements/images/'.$image; 
        $departement->save();
        return response()->json([
            'status' => (bool) $departement,
            'data'   => $departement,
            'message' => $departement ? 'Departement Updated!' : 'Error Updating Departement'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departement $departement)
    {
        $departement->delete();
        return response()->json('Successfully Deleted');
    }
}
