<!DOCTYPE html>
<html>
<head>
    <title>Nova sala</title>
</head>
<body>

    <h1>Nova sala</h1>

    <form action="salas" method="POST">

        @csrf

        <label>n°_sala:</label>
        <input type="text" name="n°_sala">

        <br><br>

        <label>bloco:</label>
        <input type="text" name="bloco">

        <br><br>

        

        <label>empresa:</label>

        <select name="empresa_id">

            <option value="">
                Selecione uma empresa
            </option>

            @foreach($empresas as $empresa)

                <option value="{{ $empresa->id }}">
                    {{ $empresa->nome }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <br>

    <a href="/salas/listar">
        Voltar
    </a>

</body>
</html>