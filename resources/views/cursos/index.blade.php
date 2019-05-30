@extends('layouts.listagem')

@section('cabecalho')
    Curso
@endsection

@section('conteudo')

@if(!empty($mensagem))
    <div class="alert alert-success text-center">
        {{$mensagem}}
    </div>
@endif

<a href="/cursos/create" class="btn btn-dark mb-2">Adicionar curso</a>

<ul class="list-group" >
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span class="ml-2">
            <span class="mr-5">ID</span>
            <span class="">Nome</span>
        </span>

        <span class="mr-5">
            <span class="mr-5">
                <span class="mr-5">Data de criação</span>
            </span>
        </span>
    </li>
    @foreach($cursos as $curso)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span class="ml-2">
            <span class="mr-5">{{ $curso->id_curso }}</span>
            <span class="ml-1">{{ $curso->nome }}</span>
        </span>

        <span class="d-flex">
            <span class="mr-5">
                <span class="mr-5" id="data_criacao-curso-{{ $curso->id_curso }}">
                    {{date('d/m/Y', strtotime( $curso->data_criacao))}}
                </span>
            </span>

            <form action="/cursos/{{ $curso->id_curso }}" method="get">
                <button class="btn btn-info btn-sm mr-1"><i class="fas fa-edit"></i></button>
            </form>

            <form method="post"
                  action="/cursos/{{ $curso->id_curso }}"
                  onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($curso->nome) }}? \n Isso tambem apagara alunos relacionados a ele')"
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
