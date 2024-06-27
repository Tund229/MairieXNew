<?php

namespace App\Models;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuichetDivorce extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_acte_divorce',
        'annee_divorce',
        'telephone',
        'nombre_copies',
        'state',
        'fichier_joint', 
        'code',
        'infos_demande',
        'date_validation_rejet',
        'motif'
    ];


    // public function region()
    // {
    //     return $this->belongsTo(Region::class, 'region_id');
    // }

    // public function mairie()
    // {
    //     return $this->belongsTo(Mairie::class, 'mairie_id');
    // }

    // public function departement()
    // {
    //     return $this->belongsTo(Departement::class, 'departement_id');
    // }


    public function agent(){
        return $this->belongsTo(User::class, 'agent_id');
    }













}
