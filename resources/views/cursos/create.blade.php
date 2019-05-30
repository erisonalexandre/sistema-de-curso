@extends('layouts.listagem')

@section('cabecalho')
    Curso
@endsection

@section('conteudo')

@if(!empty($mensagem))
    <div class="alert alert-danger text-center">
        {{$mensagem}}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-center">Adicionar curso</div>

                <div class="card-body">
                    <div class="container">
                        <form method="post" action="/cursos">
                            @csrf
                            <div class="form-group row">
                                <label for="nome" class="col-md-2 col-form-label text-md-right">Nome</label>

                                <div class="col-md-10">
                                    <input id="nome" type="text" class="form-control" name="nome" required autocomplete="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_professor" class="col-md-2 col-form-label text-md-right">Professor</label>

                                <div class="col-md-10">
                                    <select class="custom-select form-control" id="id_professor" name="id_professor" required>
                                        @foreach( $professores as $professor )
                                        <option value="{{$professor->id_professor}}">{{$professor->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-primary mt-2">Adicionar</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection