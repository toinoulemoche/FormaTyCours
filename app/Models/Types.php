<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;

    protected $table = "types";
    protected $fillable = ['libelle'];

    public function formation()
    {
        return $this->hasMany(Forms::class, 'id_types', 'id_formation');
    }
}
