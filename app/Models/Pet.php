<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $fillable = [
        'pet_name',
        'pet_type',
        'pet_color',
        'petspecies_id',
        'pet_category_id'
    ];

    public function petCategory()
    {
        return $this->belongsTo(PetCategory::class, 'petspecies_id');
    }

}
