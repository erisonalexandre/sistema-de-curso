<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use App\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursosController extends Controller
{
    public function index(Request $request)
    {
        $cursos = Curso::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');
        return view('cursos.index',compact('cursos','mensagem'));
    }

    public function edit(Request $request)
    {
        $curso = Curso::find($request->id_curso);
        return view('cursos.edit',compact('curso'));
    }

    public function create(Request $request)
    {
        $professores = Professor::query()->get();

        if($professores->count()<=0)
        {
            $request->session()->flash('mensagem','Por favor, adicione um professor antes!');
            return redirect('professores/create');
        }
        $mensagem = $request->session()->get('mensagem');
        return view('cursos.create',compact('professores','mensagem'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        Curso::create($request->all());
        DB::commit();

        $request->session()->flash('mensagem','Curso adicionado com sucesso');

        return redirect()->route('listar_cursos');
    }

    public function destroy(Request $request)
    {

        DB::beginTransaction();
        $curso = Curso::find($request->id_curso);
        $alunos = Aluno::where('id_curso',$curso->id_curso)->get();

        foreach ($alunos as $aluno)
        {
            $aluno->delete();
        }
        $curso->delete();

        DB::commit();

        return redirect()->route('listar_cursos');
    }

    public function update(Request $request, int $id_curso)
    {
        $curso = Curso::find($id_curso);
        $curso->nome = $request->nome;
        $curso->data_nascimento = $request->data_nascimento;
        $curso->save();

        return redirect()->route('listar_cursos');
    }
}
