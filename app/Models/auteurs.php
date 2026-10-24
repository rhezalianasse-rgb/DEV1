<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class auteurs extends Model
{
    protected $table = 'auteurs';

    protected $fillable = [
        'name',
        'prenom',
        'email',
        'date_naissance',
        'nationalite',
        'actif',
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'actif' => 'boolean',
    ];

    public function livres()
    {
        return $this->hasMany(livre::class, 'auteur_id');
    }
}
