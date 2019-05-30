<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    const CREATED_AT = "data_criacao";
    protected $primaryKey = "id_aluno";

    protected $fillable = [
        "nome",
        "data_nascimento",
        "logradouro",
        "numero",
        "bairro",
        "cidade",
        "estado",
        "cep",
        "id_curso"
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
