<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Produit;

class Vente extends Model
{
    use HasFactory;
    protected $table="vente";
    protected $fillable=['client_id','produit_id','qte_vente','prix','montant'];

    public function relatedClient(){
        return $this->belongsTo(Client::class,'client_id');
    }

    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
