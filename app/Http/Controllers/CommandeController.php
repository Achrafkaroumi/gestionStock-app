<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use App\Models\Achat;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index(){
        return view('dashbords.admin.command')->with([
            'achats'=>Achat::all(),
            'ventes'=>Vente::all()
        ]);
    }
}
