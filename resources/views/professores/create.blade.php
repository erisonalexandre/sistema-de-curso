@extends('layouts.listagem')

@section('cabecalho')
    Professores
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
                <div class="card-header text-center">Adicionar professor</div>
                <div class="card-body">
                    <div class="container">
                        <form method="post" action="/professores">
                            @csrf
                            <div class="form-group row">
                                <label for="nome" class="col-md-2 col-form-label text-md-right">Nome</label>

                                <div class="col-md-10">
                                    <input id="nome" type="text" class="form-control" name="nome" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="data_nascimento" class="col-form-label text-md-left">Data de nascimento</label>

                                <div class="col">
                                    <input id="data_nascimento" type="date" class="form-control" name="data_nascimento" required >
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