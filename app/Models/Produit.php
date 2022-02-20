<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\fournisseur;

class Produit extends Model
{
    use HasFactory;
    protected $table="produits";
    protected $fillable=['ref_produit','design_produit','qte','prix_achat','prix_vente','image','categorie_id'];

    public function categorie(){
        return $this->belongsTo(categorie::class);
    }

    public function fournisseur(){
        return $this->belongsToMany(fournisseur::class);
    }

    public function facture(){
        return $this->belongsTo(Facture::class);
    }

}
