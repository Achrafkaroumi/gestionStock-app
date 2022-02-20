<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rechercheCat(Request $request){
        $data=categorie::select('id','ref_categorie','nom_categorie')->where('id',$request->id)->first();
        return response()->json($data);
    }


    public function index()
    {
        
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ref_cat'=>'required',
            'nom_cat'=>'required',
        ]);

        categorie::create([
            'ref_categorie'=>$request->input('ref_cat'),
            'nom_categorie'=>$request->input('nom_cat'),
        ]);

        return back()->with('valide','Information enregistrer ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(categorie $categorie)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ref_up'=>'required',
            'nom_up'=>'required'
        ]);

        categorie::where('id',$id)->update([
            'ref_categorie'=>$request->input('ref_up'),
            'nom_categorie'=>$request->input('nom_up')
        ]);

        return back()->with('valide','Categorie modifier');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorie $categorie)
    {
        //
    }
}
