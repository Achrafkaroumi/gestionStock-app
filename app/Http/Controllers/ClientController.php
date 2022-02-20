<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashbords.agent.client')->with('client',Client::orderby('updated_at','desc')->get());
    }

    public function indexx()
    {  
        $cls=Client::all();
        return view('dashbords.admin.client.index',compact('cls'));
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
            'SIREN_Cl'=>'required',
            'Nom_Cl'=>'required',
            'Tel_Cl'=>'required',
            'Email_Cl'=>'required',
            'Adresse_Cl'=>'required'
        ]);

        $client= new Client;
        $client->SIREN_Cl=$request->input('SIREN_Cl');
        $client->Nom_Cl=$request->input('Nom_Cl');
        $client->Tel_Cl=$request->input('Tel_Cl');
        $client->Email_Cl=$request->input('Email_Cl');
        $client->Adresse_Cl=$request->input('Adresse_Cl');
        $client->save();
        return back()->with('status','Client ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'Nom_Cl_up'=>'required',
            'Tel_Cl_up'=>'required',
            'Email_Cl_up'=>'required',
            'Adresse_Cl_up'=>'required'
        ]);

        Client::where('Code_Cl',$id)->update([
            'Nom_Cl'=>$request->input('Nom_Cl_up'),
            'Tel_Cl'=>$request->input('Tel_Cl_up'),
            'Email_Cl'=>$request->input('Email_Cl_up'),
            'Adresse_Cl'=>$request->input('Adresse_Cl_up'),
        ]);
        return back()->with('status','Client modifier avec success !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->back()->with('status','Client a été supprimé avec succés');
    }
}
