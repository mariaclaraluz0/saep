<!DOCTYPE html>
<html>
<head>
    <title>Editar Agendamento</title>
</head>
<body>

    <h1>Editar Agendamento</h1>

    <form action="/agendamentos/{{ $agendamento->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>Data:</label>

        <input
            type="date"
            name="data"
            value="{{ $agendamento->data }}"
            required
        >

        <br><br>

        <label>Hora:</label>

        <input
            type="time"
            name="hora"
            value="{{ $agendamento->hora }}"
            required
        >

        <br><br>

        <label>Motivo:</label>

        <input
            type="text"
            name="motivo"
            value="{{ $agendamento->motivo }}"
        >

        <br><br>

        <label>Status:</label>

        <select name="status">

            <option value="">Selecione o status</option>

            <option value="Pendente"
                {{ $agendamento->status == 'Pendente' ? 'selected' : '' }}>
                Pendente
            </option>

            <option value="Confirmado"
                {{ $agendamento->status == 'Confirmado' ? 'selected' : '' }}>
                Confirmado
            </option>

            <option value="Concluído"
                {{ $agendamento->status == 'Concluído' ? 'selected' : '' }}>
                Concluído
            </option>

            <option value="Cancelado"
                {{ $agendamento->status == 'Cancelado' ? 'selected' : '' }}>
                Cancelado
            </option>

        </select>

        <br><br>

        <label>Pet:</label>

        <select name="pet_id" required>

            @foreach($pets as $pet)

                <option
                    value="{{ $pet->id }}"
                    {{ $agendamento->pet_id == $pet->id ? 'selected' : '' }}
                >
                    {{ $pet->nome }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Salvar
        </button>

    </form>

    <br>

    <a href="/agendamentos/listar">
        Voltar
    </a>

</body>
</html>
