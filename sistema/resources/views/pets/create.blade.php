<!DOCTYPE html>
<html>
<head>
    <title>Novo Pet</title>
</head>
<body>

    <h1>Novo Pet</h1>

    <form action="/pets" method="POST">

        @csrf

        <label>Nome do Pet:</label>
        <input type="text" name="nome" required>

        <br><br>

        <label>Espécie:</label>
        <input type="text" name="especie">

        <br><br>

        <label>Raça:</label>
        <input type="text" name="raca">

        <br><br>

        <label>Tutor:</label>

        <select name="tutor_id" required>

            <option value="">
                Selecione um tutor
            </option>

            @foreach($tutores as $tutor)

                <option value="{{ $tutor->id }}">
                    {{ $tutor->nome }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <br>

    <a href="/pets/listar">
        Voltar
    </a>

</body>
</html>

