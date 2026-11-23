<!DOCTYPE html>
<html>
<head>
    <title>Tutores</title>
</head>
<body>

    <h1>Tutores</h1>

    <a href="/principal">
        Voltar
    </a>

    <br><br>

    <a href="/tutores/create">
        <button>Novo Tutor</button>
    </a>

    <h2>Buscar Tutor</h2>

    <form action="/tutores/listar" method="GET">

        <input
            type="text"
            name="nome"
            placeholder="Digite o nome"
            value="{{ request('nome') }}"
        >

        <button type="submit">
            Pesquisar
        </button>

    </form>

    <br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>

        @foreach($tutores as $tutor)

        <tr>

            <td>{{ $tutor->id }}</td>

            <td>{{ $tutor->nome }}</td>

            <td>
                {{ decrypt($tutor->cpf_criptografado) }}
            </td>

            <td>{{ $tutor->telefone }}</td>

            <td>{{ $tutor->email }}</td>

            <td>{{ $tutor->endereco }}</td>

            <td>

                <a href="/tutores/{{ $tutor->id }}/edit">
                    Editar
                </a>

                <form
                    action="/tutores/{{ $tutor->id }}"
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
