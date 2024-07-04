<!DOCTYPE html>
<html>
<head>
    <title>Lista de Ruas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Ruas</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Bairro</th>
                    <th>CEP</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ruas as $rua)
                    <tr>
                        <td>{{ $rua->id }}</td>
                        <td>{{ $rua->nome }}</td>
                        <td>{{ $rua->bairro->nome }}</td>
                        <td>{{ $rua->cep }}</td>
                        <td>
                            <a href="{{ route('ruas.show', $rua->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('ruas.edit', $rua->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('ruas.destroy', $rua->id) }}" method="POST" style="display:inline;">
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
