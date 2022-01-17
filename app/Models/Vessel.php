<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'IMO_number',
    ];

    public function voyages()
    {
        return $this->hasMany(Voyage::class);
    }

    public function vessel_opexes()
    {
        return $this->hasMany(Vessel_Opex::class);
    }

}
