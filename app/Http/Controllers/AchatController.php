<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Facture;
use App\Models\fournisseur;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashbords.agent.achat.index')->with([
            'fournisseurs'=>fournisseur::all(),
            'produits'=>Produit::all(),
            'achats'=>Achat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'fournisseur'=>'required',
            'produit'=>'required',
            'prix_uni_ac'=>'required',
            'qte_ac'=>'required',
            'total_ac'=>'required',
            'tva'=>'required',
            'regl'=>'required'
        ]);

        Achat::create([
            'fournisseur_id'=>$request->input('fournisseur'),
            'produit_id'=>$request->input('produit'),
            'qte_achat'=>$request->input('qte_ac'),
            'prix_unitaire'=>$request->input('prix_uni_ac'),
            'montant'=>$request->input('total_ac')
        ]);
          

        
        $prodid=$request->get('produit');
        $quant=$request->get('qte_ac');
        $tva_tt=$request->get('tva');
        $total_tva=($request->get('prix_uni_ac')) * ($tva_tt/100);

        $product=Produit::where(['id'=>$prodid])->first();
        $product->prix_achat=$request->get('prix_uni_ac');

        $product->prix_vente=($product->prix_achat)+($total_tva);

        $product->qte=($product->qte)+($quant);
        $product->save();
        

        Facture::create([
            'type_pers'=>$request->input('ty_four'),
            'montant_fact'=>$request->input('total_ac'),
            'reglement'=>$request->input('regl'),
            'achat_id'=>$request->input('idAc')
        ]);

        return back()->with('statut','Achat effectuée');
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
    public function update(Request $request,$id)
    {
        $request->validate([
            'prix_upt'=>'required',
            'qte_upt'=>'required',
            'mont_upt'=>'required',
        ]);

        Achat::where('id',$id)->update([
            'qte_achat'=>$request->input('qte_upt'),
            'prix_unitaire'=>$request->input('prix_upt'),
            'montant'=>$request->input('mont_upt')
        ]);

        return back()->with('statut','Achat modifer avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achat $achat)
    {
        $achat->delete();
        return redirect()->back()->with('statut','Achat supprimé avec succés');
    }
}
