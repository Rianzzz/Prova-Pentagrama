
<!DOCTYPE html>
<html>
<head>
    <title>Criar Cidade</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Criar Nova Cidade</h1>
        <form action="{{ route('cidades.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome da Cidade:</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" id="estado" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="data_fundacao">Data de Fundação:</label>
                <input type="date" name="data_fundacao" id="data_fundacao" class="form-control" required>
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
                            if (data.localidade) {
                                $('#nome').val(data.localidade);
                            }
                            if (data.uf) {
                                $('#estado').val(data.uf);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
