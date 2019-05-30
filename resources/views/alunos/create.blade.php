@extends('layouts.listagem')

@section('cabecalho')
    Adicionar aluno
@endsection

@section('conteudo')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Adicionar aluno</div>
                <div class="card-body">
                    <div class="container">
                        <form method="post" action="/alunos">
                            @csrf
                            <div class="form-group row">
                                <label for="nome" class="col-md-2 col-form-label text-md-right">Nome</label>

                                <div class="col-md-10">
                                    <input id="nome" type="text" class="form-control" name="nome" required autocomplete="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="data_nascimento" class="col-form-label text-md-left">Data de nascimento</label>

                                <div class="col">
                                    <input id="data_nascimento" type="date" class="form-control" name="data_nascimento" required >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cep" class="col-md-2 col-form-label text-md-right">CEP</label>

                                <div class="col-md-10">
                                    <input id="cep" type="number" class="form-control" name="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="logradouro" class="col-form-label mr-4 text-md-left">Logradouro</label>

                                <div class="col">
                                    <input id="logradouro" type="text" class="form-control" name="logradouro" required readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="numero" class="col-md-2 col-form-label text-md-right">Numero</label>

                                <div class="col-md-10">
                                    <input id="numero" type="text" class="form-control" name="numero" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bairro" class="col-md-2 col-form-label text-md-right">Bairro</label>

                                <div class="col-md-10">
                                    <input id="bairro" type="text" class="form-control" name="bairro" required readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cidade" class="col-md-2 col-form-label text-md-right">Cidade</label>

                                <div class="col-md-10">
                                    <input id="cidade" type="text" class="form-control" name="cidade" required readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="estado" class="col-md-2 col-form-label text-md-right">Estado</label>

                                <div class="col-md-10">
                                    <input id="estado" type="text" class="form-control" name="estado" required readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_curso" class="col-md-2 col-form-label text-md-right">Curso</label>

                                <div class="col-md-10">
                                    <select class="custom-select form-control" id="id_curso" name="id_curso" required>
                                        <option selected disabled>Curso...</option>
                                        @foreach( $cursos as $curso )
                                            <option value="{{$curso->id_curso}}">{{$curso->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-primary mt-2" id="btn_submit" disabled>Adicionar</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('logradouro').value=("");
        document.getElementById('bairro').value=("");
        document.getElementById('cidade').value=("");
        document.getElementById('estado').value=("");
        document.getElementById('btn_submit').disabled=true;
    }

    function callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouro').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.cidade);
            document.getElementById('estado').value=(conteudo.estado_info.nome);
            document.getElementById('btn_submit').disabled=false;
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('logradouro').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                //Sincroniza com o callback.
                var url = 'https://api.postmon.com.br/v1/cep/'+ cep ;
                $.getJSON(url,callback);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
</script>
@endsection