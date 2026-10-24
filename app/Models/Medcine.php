<?php

namespace App\Models;

use Database\Factories\MedcineFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medcine extends Model
{
    /** @use HasFactory<MedcineFactory> */
    use HasFactory;

    protected $table = 'medecins';

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'tarif',
        'specialite_id',
    ];

    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }
}
