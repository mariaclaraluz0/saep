<!DOCTYPE html>
<html>
<head>
    <title>Novo Agendamento</title>
</head>
<body>

    <h1>Novo Agendamento</h1>

    <form action="/agendamentos" method="POST">

        @csrf

        <label>Data:</label>
        <input type="date" name="data" required>

        <br><br>

        <label>Hora:</label>
        <input type="time" name="hora" required>

        <br><br>

        <label>Motivo:</label>
        <input type="text" name="motivo">

        <br><br>

        <label>Status:</label>
        <select name="status">

            <option value="">Selecione o status</option>
            <option value="Pendente">Pendente</option>
            <option value="Confirmado">Confirmado</option>
            <option value="Concluído">Concluído</option>
            <option value="Cancelado">Cancelado</option>

        </select>

        <br><br>

        <label>Pet:</label>

        <select name="pet_id" required>

            <option value="">Selecione um pet</option>

            @foreach($pets as $pet)

                <option value="{{ $pet->id }}">
                    {{ $pet->nome }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <br>

    <a href="/agendamentos/listar">
        Voltar
    </a>

</body>
</html>
