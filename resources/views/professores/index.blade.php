@extends('layouts.listagem')

@section('cabecalho')
    Professores
@endsection

@section('conteudo')

@if(!empty($mensagem))
    <div class="alert alert-success text-center">
        {{$mensagem}}
    </div>
@endif

<a href="/professores/create" class="btn btn-dark mb-2">Adicionar professor</a>

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
    @foreach($professores as $professor)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span class="ml-2">
            <span class="mr-5">{{ $professor->id_professor }}</span>
            <span class="ml-1">{{ $professor->nome }}</span>
        </span>

        <span class="d-flex">
            <span class="mr-5">
                <span class="mr-5" id="span-data_nascimento-professor-{{ $professor->id_professor }}">
                    {{date('d/m/Y', strtotime( $professor->data_nascimento))}}
                </span>

                <span class="mr-5 ml-5" id="data_criacao-professor-{{ $professor->id_professor }}">
                    {{date('d/m/Y', strtotime( $professor->data_criacao))}}
                </span>
            </span>

            <form action="/professores/{{ $professor->id_professor }}" method="get">
                <button class="btn btn-info btn-sm mr-1"><i class="fas fa-edit"></i></button>
            </form>

            <form method="post"
                  action="/professores/{{ $professor->id_professor }}"
                  onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($professor->nome) }}? \n Isso tambem apagara cursos e alunos relacionados a ele')"
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
