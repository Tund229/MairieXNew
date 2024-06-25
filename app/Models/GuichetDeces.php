<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuichetDeces extends Model
{
    use HasFactory;
    protected $fillable = [
        'region_id',
        'mairie_id',
        'departement_id',
        'nom_defunt',
        'prenom_defunt',
        'nombre_copies',
        'numero_acte_deces',
        'annee_deces',
        'fichier',
        'code',
        'state',
        'telephone',
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

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }


}
