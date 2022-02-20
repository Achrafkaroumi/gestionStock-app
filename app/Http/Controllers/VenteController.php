<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rechercheProd(Request $request){
        $data=Produit::select('prix_vente')->where('id',$request->id)->first();
        return response()->json($data);
    }


    public function index()
    {
        return view('dashbords.agent.vente.index')->with([
            'clients'=>Client::all(),
            'vents'=>Vente::all(),
            'products'=>Produit::where('qte','!=',0)->get()
        ]);
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
            'nom_clt'=>'required',
            'produit'=>'required',
            'prix_uni_at'=>'required',
            'qte_at'=>'required',
            'mnt_ac'=>'required',
            'regle'=>'required'
        ]);

        Vente::create([
            'client_id'=>$request->input('nom_clt'),
            'produit_id'=>$request->input('produit'),
            'qte_vente'=>$request->input('qte_at'),
            'prix'=>$request->input('prix_uni_at'),
            'montant'=>$request->input('mnt_ac')
        ]);
          

        
        $prodid=$request->get('produit');
        $quant=$request->get('qte_at');

        $product=Produit::where(['id'=>$prodid])->first();
        $product->qte=($product->qte)-($quant);
        $product->save();
        

        Facture::create([
            'type_pers'=>$request->input('ty_cl'),
            'montant_fact'=>$request->input('mnt_ac'),
            'reglement'=>$request->input('regle'),
            'vente_id'=>$request->input('idvt')
        ]);

        return back()->with('statut','Vente effectuée');
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
        $request->validate([
            'qte_up'=>'required'
        ]);
        
        Vente::where('id',$id)->update([
            'qte_vente'=>$request->input('qte_up'),
        ]);

        return back()->with('statut','Achat modifer avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vente $vente)
    {
        $vente->delete();
        return redirect()->back()->with('statut','Vente supprimé avec succés');
    }
}
