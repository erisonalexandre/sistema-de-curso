<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>RELATORIO </title>
</head>
<body>
<div class="text-center mb-5">
    <span>RELATORIO DE RELACAO DE ALUNO</span>
</div>

<table class="table mt-1">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Aluno</th>
        <th scope="col">Curso</th>
        <th scope="col">Professor</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $alunos as $aluno)
        <tr>
            <th scope="row">1</th>
            <td>{{$aluno['nome']}}</td>
            <td>{{$aluno['nome_curso']}}</td>
            <td>{{$aluno['nome_professor']}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>