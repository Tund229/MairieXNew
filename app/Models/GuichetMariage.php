<?php

namespace App\Models;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuichetMariage extends Model
{
    use HasFactory;
    protected $fillable = [
        'region_id',
        'mairie_id',
        'departement_id',
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
        'infos_demande',
        'fichier',
        'date_validation_rejet',
        'motif'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function mairie()
    {
        return $this->belongsTo(Mairie::class, 'mairie_id');
    }

    public function agent(){
        return $this->belongsTo(User::class, 'agent_id');
    }

    
    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }

    
    
}
