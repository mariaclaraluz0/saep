<!DOCTYPE html>
<html>
<head>
    <title>Novo Tutor</title>
</head>
<body>

    <h1>Novo Tutor</h1>

    <form action="/tutores" method="POST">

        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <br><br>

        <label>CPF:</label>
        <input type="text" name="cpf" required>

        <br><br>

        <label>Telefone:</label>
        <input type="text" name="telefone">

        <br><br>

        <label>E-mail:</label>
        <input type="email" name="email">

        <br><br>

        <label>Endereço:</label>
        <input type="text" name="endereco">

        <br><br>

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <br>

    <a href="/tutores/listar">
        Voltar
    </a>

</body>
</html>
