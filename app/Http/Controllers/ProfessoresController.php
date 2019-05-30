<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use App\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessoresController extends Controller
{
    public function index(Request $request)
    {
        $professores = Professor::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');
        return view('professores.index',compact('professores','mensagem'));
    }

    public function edit(Request $request)
    {
        $professor = Professor::find($request->id_professor);
        return view('professores.edit',compact('professor'));
    }

    public function create(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        return view('professores.create',compact('mensagem'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        Professor::create(['nome' => $request->nome, 'data_nascimento' => $request->data_nascimento]);
        DB::commit();

        $request->session()->flash('mensagem','Professor adicionado com sucesso');

        return redirect()->route('listar_professores');
    }

    public function destroy(Request $request)
    {

        DB::beginTransaction();
        $professor = Professor::find($request->id_professor);
        $cursos = Curso::where('id_professor',$professor->id_professor)->get();
        foreach( $cursos as $curso )
        {
            $alunos = Aluno::where('id_curso',$curso->id_curso)->get();
            foreach ($alunos as $aluno)
            {
                $aluno->delete();
            }
            $curso->delete();
        }
        $professor->delete();
        DB::commit();

        $request->session()->flash('mensagem','Professor removido com sucesso');
        return redirect()->route('listar_professores');
    }

    public function update(Request $request, int $id_professor)
    {
        $professor = Professor::find($id_professor);
        $professor->nome = $request->nome;
        $professor->data_nascimento = $request->data_nascimento;
        $professor->save();

        return redirect()->route('listar_professores');
    }
}
