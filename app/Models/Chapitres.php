<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitres extends Model
{
    use HasFactory;

    protected $table = "chapitres";
    protected $fillable = ['name_chap', 'duration', 'numero', 'cours'];

    public function formation()
    {
        return $this->belongsTo(Forms::class, 'id_chapitre', 'id_formations');
    }
}
