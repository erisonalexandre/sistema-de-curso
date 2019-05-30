<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlunosController extends Controller
{
    public function index(Request $request)
    {
        $alunos = Aluno::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');
        return view('alunos.index',compact('alunos','mensagem'));
    }

    public function edit(Request $request)
    {
        $aluno = Aluno::find($request->id_aluno);
        $cursos = Curso::query()->get();
        if ($cursos->count()<=0)
        {
            $request->session()->flash('mensagem','Por favor, adicione um curso antes!');
            return redirect('cursos/create');
        }
        return view('alunos.edit',compact('aluno','cursos'));
    }

    public function create(Request $request)
    {
        $cursos = Curso::query()->get();
        if ($cursos->count()<=0)
        {
            $request->session()->flash('mensagem','Por favor, adicione um curso antes!');
            return redirect('cursos/create');
        }
        return view('alunos.create',compact('cursos'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        Aluno::create($request->all());
        DB::commit();
        $request->session()->flash('mensagem','Aluno adicionado com sucesso');

        return redirect()->route('listar_alunos');
    }

    public function destroy(Request $request)
    {

        DB::beginTransaction();
        Aluno::destroy($request->id_aluno);
        DB::commit();

        return redirect()->route('listar_alunos');
    }

    public function update(Request $request, int $id_aluno)
    {
        $aluno = Aluno::find($id_aluno);
        $aluno->nome = $request->nome;
        $aluno->data_nascimento = $request->data_nascimento;
        $aluno->cep = $request->cep;
        $aluno->logradouro = $request->logradouro;
        $aluno->numero = $request->numero;
        $aluno->cidade = $request->cidade;
        $aluno->bairro = $request->bairro;
        $aluno->estado = $request->estado;
        $aluno->id_curso = $request->id_curso;
        $aluno->save();

        return redirect()->route('listar_alunos');
    }

}
