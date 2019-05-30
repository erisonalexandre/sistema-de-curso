<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    const CREATED_AT = "data_criacao";
    protected $primaryKey = "id_professor";

    protected $fillable = [
        "nome",
        "data_nascimento",
    ];
}
