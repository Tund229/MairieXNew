<?php

namespace App\Models;

use App\Models\User;
use App\Models\Mairie;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name']; 

    public function departements()
    {
        return $this->hasMany(Departement::class);


    }

    public function regions()
    {
        return $this->hasMany(User::class);
    }
}


