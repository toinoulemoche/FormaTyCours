<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    use HasFactory;

    protected $table = "formations";
    protected $fillable = ['name_formation', 'description', 'prix', 'image_form', 'nb_views', 'nb_completions'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function type()
    {
        return $this->hasOne(Types::class, 'id_types', 'id_type');
    }

    public function chapitre()
    {
        return $this->hasMany(Chapitres::class, 'id_chapitre', 'id_formation');
    }
}
