<!DOCTYPE html>
<html>
<head>
    <title>Lista de Cidades</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Cidades</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Data de Fundação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cidades as $cidade)
                    <tr>
                        <td>{{ $cidade->id }}</td>
                        <td>{{ $cidade->nome }}</td>
                        <td>{{ $cidade->estado }}</td>
                        <td>{{ $cidade->data_fundacao }}</td>
                        <td>
                            <a href="{{ route('cidades.show', $cidade->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('cidades.edit', $cidade->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('cidades.destroy', $cidade->id) }}" method="POST" style="display:inline;">
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
