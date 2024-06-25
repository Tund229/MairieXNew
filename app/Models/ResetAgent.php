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
        'mairie_id',
        'email'
    ];
    public function mairies()
    {
        return $this->belongsTo(Mairie::class, 'mairie_id');
    }

    public function departements()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }

    public function regions()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }


}
