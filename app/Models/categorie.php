<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable=['ref_categorie','nom_categorie'];

    public function produit(){
        return $this->hasMany(Produit::class);
    }
}
