<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vessel_Opex extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'expenses',
    ];

    public function vessel_opexes()
    {
        return $this->hasMany(Vessel_Opex::class);
    }

}
