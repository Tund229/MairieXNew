<?php

namespace App\Models;

use App\Models\Mairie;
use App\Models\Region;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResetAgent extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email'
    ];
   


}
