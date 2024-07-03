<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuichetDeces extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_defunt',
        'prenom_defunt',
        'nombre_copies',
        'numero_acte_deces',
        'annee_deces',
        'fichier',
        'fichiers_joints', // Ajout du champ fichier_joint au fillable
        'code',
        'state',
        'telephone',
        'infos_demande',
        'date_validation_rejet',
        'motif'
    ];





    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }



}
