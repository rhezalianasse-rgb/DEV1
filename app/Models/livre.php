<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class livre extends Model
{
    protected $table = 'livres';

    protected $fillable = [
        'auteur_id',
        'titre',
        'isbn',
        'prix',
        'stock',
        'date_publication',
        'disponible',
    ];

    protected $casts = [
        'date_publication' => 'date',
        'prix' => 'decimal:2',
        'disponible' => 'boolean',
        'auteur_id' => 'integer',
        'stock' => 'integer',
    ];

    public function auteur()
    {
        return $this->belongsTo(auteurs::class, 'auteur_id');
    }
}
