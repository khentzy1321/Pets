<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_species',
        'pet_category_id',
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class, 'pet_category_id');
    }

}
