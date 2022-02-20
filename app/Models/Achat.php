<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;
use App\Models\fournisseur;
use App\Models\Facture;
class Achat extends Model
{
    use HasFactory;
    protected $table="achat";
    protected $fillable=['fournisseur_id','produit_id','qte_achat','prix_unitaire','montant'];

    public function facture(){
        return $this->hasMany(Facture::class);
    }

    public function fournisseur(){
        return $this->belongsTo(fournisseur::class);
    }

    public function produit(){
        return $this->belongsTo(Produit::class);
    }

}
