<?php

namespace App\Models;

use App\Models\User;
use App\Models\Region;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mairie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'departement_id']; 

    public function departements()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }


    public function mairies()
    {
        return $this->hasMany(User::class);
    }
}
