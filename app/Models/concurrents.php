<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class concurrents extends Model
{
    use HasFactory;

    protected $fillable=["id_offer","id_avis","Nom","Postuler","Dossier_complet","existe","eliminer","Motif","reserver","objet_reserve","Mantant_dactes"];
}
