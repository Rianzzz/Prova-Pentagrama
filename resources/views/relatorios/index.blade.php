<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Cidades, Bairros e Ruas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Relatório de Cidades, Bairros e Ruas</h1>
        <form method="GET" action="{{ route('relatorios.index') }}">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="cidade">Nome da Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="{{ request('cidade') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="bairro">Nome do Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="{{ request('bairro') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="rua">Nome da Rua</label>
                    <input type="text" class="form-control" id="rua" name="rua" value="{{ request('rua') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="data_inicio">Data de Fundação Inicial</label>
                    <input type="date" class="form-control" id="data_inicio" name="data_inicio" value="{{ request('data_inicio') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="data_fim">Data de Fundação Final</label>
                    <input type="date" class="form-control" id="data_fim" name="data_fim" value="{{ request('data_fim') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Rua</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cidades as $cidade)
                    @foreach ($cidade->bairros as $bairro)
                        @foreach ($bairro->ruas as $rua)
                            <tr>
                                <td>{{ $cidade->nome }}</td>
                                <td>{{ $bairro->nome }}</td>
                                <td>{{ $rua->nome }}</td>
                                <td>
                                    <a href="{{ route('cidades.edit', $cidade->id) }}" class="btn btn-warning btn-sm">Editar Cidade</a>
                                    <a href="{{ route('bairros.edit', $bairro->id) }}" class="btn btn-warning btn-sm">Editar Bairro</a>
                                    <a href="{{ route('ruas.edit', $rua->id) }}" class="btn btn-warning btn-sm">Editar Rua</a>
                                    <form action="{{ route('cidades.destroy', $cidade->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Deletar Cidade</button>
                                    </form>
                                    <form action="{{ route('bairros.destroy', $bairro->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Deletar Bairro</button>
                                    </form>
                                    <form action="{{ route('ruas.destroy', $rua->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Deletar Rua</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#cep').on('blur', function() {
                var cep = $(this).val();
                if (cep) {
                    $.ajax({
                        url: '{{ route("buscar.cep") }}',
                        type: 'GET',
                        data: { cep: cep },
                        success: function(data) {
                            if (data.localidade) {
                                $('#cidade').val(data.localidade);
                            }
                            if (data.bairro) {
                                $('#bairro').val(data.bairro);
                            }
                            if (data.logradouro) {
                                $('#rua').val(data.logradouro);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
