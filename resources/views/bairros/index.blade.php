
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Bairros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Bairros</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bairros as $bairro)
                    <tr>
                        <td>{{ $bairro->id }}</td>
                        <td>{{ $bairro->nome }}</td>
                        <td>{{ $bairro->cidade->nome }}</td>
                        <td>
                            <a href="{{ route('bairros.show', $bairro->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('bairros.edit', $bairro->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('bairros.destroy', $bairro->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
