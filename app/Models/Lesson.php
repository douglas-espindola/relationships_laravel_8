<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'video'
    ];

    // (Inverso) do One to many (Muitos pra um N:1)
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
