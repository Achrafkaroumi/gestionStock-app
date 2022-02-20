<?php

namespace App\Http\Controllers;

use App\Models\fournisseur;
use Illuminate\Http\Request;
use App\DataTables\fournisseurDataTable;

class FournisseursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashbords.agent.fournisseur')->with('fournisseurs', fournisseur::orderBy('updated_at','Desc')->get());;
    }

    public function indexx(){
    return view('dashbords.admin.fournisseur.index')->with('fournisseurs', fournisseur::orderBy('updated_at','Desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomFr'=>'required',
            'telFr'=>'required',
            'emailFr'=>'required',
            'adresseFr'=>'required'
        ]);

        $test=fournisseur::create([
            'nom'=>$request->input('nomFr'),
            'secteur'=>$request->input('secteurFr'),
            'telephone'=>$request->input('telFr'),
            'adresse'=>$request->input('adresseFr'),
            'email'=>$request->input('emailFr')
        ]);
        return back()->with('valide','Fournisseur ajouter avec succés !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fournisseurs  $fournisseurs
     * @return \Illuminate\Http\Response
     */
    public function show(fournisseur $fournisseurs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fournisseurs  $fournisseurs
     * @return \Illuminate\Http\Response
     */
    public function edit(fournisseur $fournisseurs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fournisseurs  $fournisseurs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'siren_up'=>'required',
            'nom_up'=>'required',
            'tel_up'=>'required',
            'email_up'=>'required',
            'adresse_up'=>'required'
        ]);

        fournisseur::where('id',$id)->update([
            'siren'=>$request->input('siren_up'),
            'nom'=>$request->input('nom_up'),
            'secteur'=>$request->input('secteur_up'),
            'telephone'=>$request->input('tel_up'),
            'adresse'=>$request->input('adresse_up'),
            'email'=>$request->input('email_up')
        ]);
        return back()->with('valide','Fournisseur modifier avec succés !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fournisseurs  $fournisseurs
     * @return \Illuminate\Http\Response
     */
    public function destroy(fournisseur $fournisseur)
    {
        $fournisseur->delete();
        return redirect()->back()->with('message','Fournisseur a été supprimé avec succés');
    }

}
