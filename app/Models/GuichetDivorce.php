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
        'agent_id',
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
