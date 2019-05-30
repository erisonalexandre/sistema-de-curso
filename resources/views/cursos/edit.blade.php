@extends('layouts.listagem')

@section('cabecalho')
    Editar curso
@endsection

@section('conteudo')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Editar curso</div>
                <div class="card-body">
                    <div class="container">
                        <form method="post" action="/cursos/{{$curso->id_curso}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="nome" class="col-md-2 col-form-label text-md-right">Nome</label>

                                <div class="col-md-10">
                                    <input value="{{$curso->nome}}" id="nome" type="text" class="form-control" name="nome" required autocomplete="name">
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

                            <button class="btn btn-primary mt-2">Salvar</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
