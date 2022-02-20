<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\fournisseur;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $fournisseurs_total = fournisseur::all();
        $client=Client::all();
        $categories=categorie::all();
        $produit_null=Produit::where('qte','=',0)->count();
        $produit_notnull=Produit::where('qte','!=',0)->count();
        return view('dashbords.admin.index',compact('fournisseurs_total','client','categories','produit_null','produit_notnull'));
    }
}

