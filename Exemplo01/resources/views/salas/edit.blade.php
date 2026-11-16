<!DOCTYPE html>
<html>
<head>
    <title>Editar sala</title>
</head>
<body>

    <h1>Editar sala</h1>

    <form action="/salas/{{ $sala->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>n°_sala:</label>

        <input
            type="text"
            name="n°_sala"
            value="{{ $sala->n°_sala }}"
        >

        <br><br>

        <label>bloco:</label>

        <input
            type="text"
            name="bloco"
            value="{{ $sala->bloco }}"
        >

        <br><br>

        

        <label>Empresa:</label>

        <select name="empresa_id">

            @foreach($empresas as $empresa)

                <option
                    value="{{ $empresa->id }}"
                    {{ $sala->empresa_id == $empresa->id ? 'selected' : '' }}
                >
                    {{ $sala->nome }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Salvar
        </button>

    </form>

    <br>

    <a href="/salas/listar">
        Voltar
    </a>

</body>
</html>