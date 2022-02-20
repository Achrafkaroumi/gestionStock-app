<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = "clients";
    protected $fillable = ['SIREN_Cl','Nom_Cl','Tel_Cl','Email_Cl','Adresse_Cl'];
    protected $primaryKey = "Code_Cl";
}
