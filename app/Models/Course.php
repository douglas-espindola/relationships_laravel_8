<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'availabe'
    ];

    // Relacionamento One To Many (Um pra muitos 1:N)
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
