<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    const CREATED_AT = "data_criacao";
    protected $primaryKey = "id_curso";

    protected $fillable = [
        "nome",
        "id_professor"
    ];

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
