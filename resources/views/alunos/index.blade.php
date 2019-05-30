@extends('layouts.listagem')

@section('cabecalho')
    Alunos
@endsection

@section('conteudo')

@if(!empty($mensagem))
    <div class="alert alert-success text-center">
        {{$mensagem}}
    </div>
@endif

<a href="/alunos/create" class="btn btn-dark mb-2">Adicionar aluno</a>

<ul class="list-group" >
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span class="ml-2">
            <span class="mr-5">ID</span>
            <span class="">Nome</span>
        </span>

        <span class="mr-5">
            <span class="mr-5">
                <span class="mr-5">Data de nascimento</span>
                <span class="mr-5">Data de criação</span>
            </span>
        </span>
    </li>
    @foreach($alunos as $aluno)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span class="ml-2">
            <span class="mr-5">{{ $aluno->id_aluno }}</span>
            <span class="ml-1">{{ $aluno->nome }}</span>
        </span>

        <span class="d-flex">
            <span class="mr-5">
                <span class="mr-5" id="span-data_nascimento-aluno-{{ $aluno->id_aluno }}">
                    {{date('d/m/Y', strtotime( $aluno->data_nascimento))}}
                </span>

                <span class="mr-5 ml-5" id="data_criacao-aluno-{{ $aluno->id_aluno }}">
                    {{date('d/m/Y', strtotime( $aluno->data_criacao))}}
                </span>
            </span>

            <form action="/alunos/{{ $aluno->id_aluno }}" method="get">
                <button class="btn btn-info btn-sm mr-1"><i class="fas fa-edit"></i></button>
            </form>

            <form method="post"
                  action="/alunos/{{ $aluno->id_aluno }}"
                  onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($aluno->nome) }}?')"
            >
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
        </span>
    </li>
    @endforeach
</ul>
@endsection
