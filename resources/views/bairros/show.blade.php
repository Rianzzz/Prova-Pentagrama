<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Bairro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Detalhes do Bairro</h1>
        <div class="card">
            <div class="card-header">
                Bairro #{{ $bairro->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $bairro->nome }}</h5>
                <p class="card-text">Cidade: {{ $bairro->cidade->nome }}</p>
                <a href="{{ route('bairros.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>
