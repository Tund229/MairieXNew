<?php

namespace App\Models;

use App\Models\User;
use App\Models\Mairie;
use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'region_id']; 

    public function regions()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }


    public function mairies()
    {
        return $this->hasMany(Mairie::class);
    }

    public function departements()
    {
        return $this->hasMany(User::class);
    }


   
    
}
