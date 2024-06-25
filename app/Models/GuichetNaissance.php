<?php

namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuichetNaissance extends Model
{
    use HasFactory;
    protected $fillable = [
        'region_id',
        'mairie_id',
        'departement_id',
        'nom',
        'prenom',
        'lieu_naissance',
        'date_naissance',
        'telephone',
        'nombre_copies',
        'prenom_pere',
        'nom_prenom_mere',
        'annee_registre',
        'numero_acte_naissance',
        'state',
        'code',
        'infos_demande',
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
