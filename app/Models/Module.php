<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // One to Many (Inverso) many to one (Muitos pra um)
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // One to Many (Um pra muitos)
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
