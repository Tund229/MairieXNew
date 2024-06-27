<?php

namespace App\Models;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuichetCertificat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'nombre_copies',
        'fichier',
        'fichier_joint', // Ajout du champ fichier_joint au fillable
        'state',
        'code',
        'infos_demande',
        'lieu_naissance',
        'date_validation_rejet',
        'motif',
    ];



    public function agent(){
        return $this->belongsTo(User::class, 'agent_id');
    }
}
