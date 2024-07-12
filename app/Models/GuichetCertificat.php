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
        'agent_id',
        'prenom',
        'telephone',
        'nombre_copies',
        'fichier',
        'fichiers_joints',
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
