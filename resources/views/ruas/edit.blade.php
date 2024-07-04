<!DOCTYPE html>
<html>
<head>
    <title>Editar Rua</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Editar Rua</h1>
        <form action="{{ route('ruas.update', $rua->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome da Rua:</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $rua->nome }}" required>
            </div>
            <div class="form-group">
                <label for="bairro_id">Bairro:</label>
                <select name="bairro_id" id="bairro_id" class="form-control" required>
                    @foreach ($bairros as $bairro)
                        <option value="{{ $bairro->id }}" {{ $rua->bairro_id == $bairro->id ? 'selected' : '' }}>{{ $bairro->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" name="cep" id="cep" class="form-control" value="{{ $rua->cep }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>
