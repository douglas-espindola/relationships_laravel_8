<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    // Relacionamento One To One (Um pra um) inverso
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
