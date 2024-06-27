<?php

namespace App\Models;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuichetMariage extends Model
{
    use HasFactory;
    protected $fillable = [
        'prenom_epoux',
        'nom_epoux',
        'prenom_epouse',
        'nom_epouse',
        'telephone',
        'nombre_copies',
        'annee_registre',
        'numero_registre_bulletin',
        'state',
        'code',
        'fichier_joint', 
        'infos_demande',
        'fichier',
        'date_validation_rejet',
        'motif'
    ];


    public function agent(){
        return $this->belongsTo(User::class, 'agent_id');
    }




}
