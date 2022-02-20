<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Facture;
use App\Models\Vente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_ac(Request $request)
    {   
        $achat=Achat::where(['id'=>$request->id])->get();
        $facture=Facture::all()->count();
        $pdf = PDF::loadView('dashbords.agent.facturation.index',['achat'=>$achat,'facture'=>$facture]);
        return $pdf->download('achat.pdf');
        
    }

    public function index_vt(Request $request)
    {   
        $vente=Vente::where(['id'=>$request->id])->get();
        $facture=Facture::all()->count();
        $pdf = PDF::loadView('dashbords.agent.facturation.vente',['vente'=>$vente,'facture'=>$facture]);
        return $pdf->download('vente.pdf');
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
