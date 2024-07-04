<!DOCTYPE html>
<html>
<head>
    <title>Editar Bairro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Editar Bairro</h1>
        <form action="{{ route('bairros.update', $bairro->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome do Bairro:</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $bairro->nome }}" required>
            </div>
            <div class="form-group">
                <label for="cidade_id">Cidade:</label>
                <select name="cidade_id" id="cidade_id" class="form-control" required>
                    @foreach ($cidades as $cidade)
                        <option value="{{ $cidade->id }}" {{ $bairro->cidade_id == $cidade->id ? 'selected' : '' }}>{{ $cidade->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>
