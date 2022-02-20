<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;
use App\Models\Achat;
class Facture extends Model
{
    use HasFactory;
    protected $table="factures";
    protected $fillable=['type_pers','montant_fact','reglement','achat_id','vente_id'];

    public function produit(){
        return $this->hasMany(Produit::class);
    }

    public function achats(){
        return $this->belongsTo(Achat::class,'id');
    }
}
