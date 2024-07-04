<!DOCTYPE html>
<html>
<head>
    <title>Detalhes da Cidade</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Detalhes da Cidade</h1>
        <div class="card">
            <div class="card-header">
                Cidade #{{ $cidade->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $cidade->nome }}</h5>
                <p class="card-text">Estado: {{ $cidade->estado }}</p>
                <p class="card-text">Data de Fundação: {{ $cidade->data_fundacao }}</p>
                <a href="{{ route('cidades.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>
