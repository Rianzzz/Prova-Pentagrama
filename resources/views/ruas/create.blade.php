<!DOCTYPE html>
<html>
<head>
    <title>Criar Rua</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Criar Nova Rua</h1>
        <form action="{{ route('ruas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome da Rua:</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="bairro_id">Bairro:</label>
                <select name="bairro_id" id="bairro_id" class="form-control" required>
                    @foreach ($bairros as $bairro)
                        <option value="{{ $bairro->id }}">{{ $bairro->nome }}</option>
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
                            if (data.logradouro) {
                                $('#nome').val(data.logradouro);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>

