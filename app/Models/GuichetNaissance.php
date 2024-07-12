<?php

namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuichetNaissance extends Model
{
    use HasFactory;
    protected $fillable = [

        'nom',
        'prenom',
        'lieu_naissance',
        'date_naissance',
        'telephone',
        'nombre_copies',
        'prenom_pere',
        'agent_id',
        'nom_prenom_mere',
        'annee_registre',
        'numero_acte_naissance',
        'state',
        'fichiers_joints',
        'code',
        'infos_demande',
        'date_validation_rejet',
        'motif'
    ];

    public function agent(){
        return $this->belongsTo(User::class, 'agent_id');
    }

}
