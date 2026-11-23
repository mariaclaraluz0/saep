<!DOCTYPE html>
<html>
<head>
    <title>Editar Pet</title>
</head>
<body>

    <h1>Editar Pet</h1>

    <form action="/pets/{{ $pet->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>Nome do Pet:</label>

        <input
            type="text"
            name="nome"
            value="{{ $pet->nome }}"
            required
        >

        <br><br>

        <label>Espécie:</label>

        <input
            type="text"
            name="especie"
            value="{{ $pet->especie }}"
        >

        <br><br>

        <label>Raça:</label>

        <input
            type="text"
            name="raca"
            value="{{ $pet->raca }}"
        >

        <br><br>

        <label>Tutor:</label>

        <select name="tutor_id" required>

            @foreach($tutores as $tutor)

                <option
                    value="{{ $tutor->id }}"
                    {{ $pet->tutor_id == $tutor->id ? 'selected' : '' }}
                >
                    {{ $tutor->nome }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Salvar
        </button>

    </form>

    <br>

    <a href="/pets/listar">
        Voltar
    </a>

</body>
</html>
