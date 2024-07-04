<!DOCTYPE html>
<html>
<head>
    <title>Editar Cidade</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Editar Cidade</h1>
        <form action="{{ route('cidades.update', $cidade->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome da Cidade:</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $cidade->nome }}" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" id="estado" class="form-control" value="{{ $cidade->estado }}" required>
            </div>
            <div class="form-group">
                <label for="data_fundacao">Data de Fundação:</label>
                <input type="date" name="data_fundacao" id="data_fundacao" class="form-control" value="{{ $cidade->data_fundacao }}" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>
