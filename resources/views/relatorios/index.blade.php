@extends('layouts.listagem')

@section('cabecalho')
    Relatorio
@endsection

@section('conteudo')

<a href="/relatorio/pdf" class="btn btn-dark mb-2">Baixar PDF</a>

<div class="mt-1">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Aluno</th>
            <th scope="col">Curso</th>
            <th scope="col">Professor</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $alunos as $aluno)
            <tr>
                <td>{{$aluno['nome']}}</td>
                <td>{{$aluno['nome_curso']}}</td>
                <td>{{$aluno['nome_professor']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection