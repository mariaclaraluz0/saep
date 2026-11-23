<!DOCTYPE html>
<html>
<head>
    <title>Pets</title>
</head>
<body>

    <h1>Pets Cadastrados</h1>

    <a href="/principal">
        Voltar
    </a>

    <br><br>

    <a href="/pets/create">
        <button>Novo Pet</button>
    </a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Espécie</th>
            <th>Raça</th>
            <th>Tutor</th>
            <th>Ações</th>
        </tr>

        @foreach($pets as $pet)

        <tr>

            <td>{{ $pet->id }}</td>

            <td>{{ $pet->nome }}</td>

            <td>{{ $pet->especie }}</td>

            <td>{{ $pet->raca }}</td>

            <td>
                {{ $pet->tutor->nome }}
            </td>

            <td>

                <a href="/pets/{{ $pet->id }}/edit">
                    Editar
                </a>

                <form
                    action="/pets/{{ $pet->id }}"
                    method="POST"
                    style="display:inline"
                >

                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Excluir
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

</body>
</html>
