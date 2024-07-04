<!DOCTYPE html>
<html>
<head>
    <title>Detalhes da Rua</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Detalhes da Rua</h1>
        <div class="card">
            <div class="card-header">
                Rua #{{ $rua->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $rua->nome }}</h5>
                <p class="card-text">Bairro: {{ $rua->bairro->nome }}</p>
                <p class="card-text">CEP: {{ $rua->cep }}</p>
                <a href="{{ route('ruas.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>
