<!DOCTYPE html>
<html>
<head>
    <title>Criar Bairro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Criar Novo Bairro</h1>
        <form action="{{ route('bairros.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome do Bairro:</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cidade_id">Cidade:</label>
                <select name="cidade_id" id="cidade_id" class="form-control" required>
                    @foreach ($cidades as $cidade)
                        <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" name="cep" id="cep" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
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
                            if (data.bairro) {
                                $('#nome').val(data.bairro);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
