<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;
class fournisseur extends Model
{
    use HasFactory;
    protected $table="fournisseurs";
    protected $fillable = ['siren','nom','secteur','telephone','adresse','email'];

    public function produit(){
        return $this->belongsToMany(Produit::class);
    }
}
