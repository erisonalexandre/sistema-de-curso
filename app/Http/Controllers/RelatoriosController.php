<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use App\Professor;

class RelatoriosController extends Controller
{
    public function index()
    {
        $alunos = RelatoriosController::relacao();
        return view('relatorios.index',compact('alunos'));
    }

    public function gerarPDF()
    {
        $alunos = RelatoriosController::relacao();
        return \PDF::loadView('relatorios.tabela-pdf', compact('alunos'))
            // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
            ->download('nome-arquivo-pdf-gerado.pdf');
    }

    protected function relacao(){
        $query_alunos = Aluno::query()
            ->orderBy('nome')
            ->get();
        $query_cursos = Curso::query()->get();
        $query_professores = Professor::query()->get();
        $alunos = [];

        foreach ( $query_alunos as $aluno)
        {
            $curso = $query_cursos->find($aluno->id_curso);
            $professor = $query_professores->find($curso['id_professor']);

            array_push(
                $alunos,
                [
                    'nome' => $aluno->nome,
                    'nome_curso' => $curso['nome'],
                    'nome_professor' => $professor['nome']
                ]
            );
        }

        return $alunos;
    }
}
