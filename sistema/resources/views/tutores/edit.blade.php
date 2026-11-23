<!DOCTYPE html>
<html>
<head>
    <title>Editar Tutor</title>
</head>
<body>

    <h1>Editar Tutor</h1>

    <form action="/tutores/{{ $tutor->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>Nome:</label>

        <input
            type="text"
            name="nome"
            value="{{ $tutor->nome }}"
            required
        >

        <br><br>

        <label>CPF:</label>

        <input
            type="text"
            name="cpf"
            placeholder="Digite o CPF"
        >

        <br><br>

        <label>Telefone:</label>

        <input
            type="text"
            name="telefone"
            value="{{ $tutor->telefone }}"
        >

        <br><br>

        <label>E-mail:</label>

        <input
            type="email"
            name="email"
            value="{{ $tutor->email }}"
        >

        <br><br>

        <label>Endereço:</label>

        <input
            type="text"
            name="endereco"
            value="{{ $tutor->endereco }}"
        >

        <br><br>

        <button type="submit">
            Salvar
        </button>

    </form>

    <br>

    <a href="/tutores/listar">
        Voltar
    </a>

</body>
</html>
