<!DOCTYPE html>
<html>
<head>
    <title>Login - Clínica Veterinária</title>
</head>
<body>

    <h1>Login - Clínica Veterinária</h1>

    @if(session('erro'))
        <p>{{ session('erro') }}</p>
    @endif

    @if(session('sucesso'))
        <p>{{ session('sucesso') }}</p>
    @endif

    <form action="/login" method="POST">

        @csrf

        <label>E-mail:</label>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
        >

        <br><br>

        <label>Senha:</label>

        <input
            type="password"
            name="senha"
            required
        >

        <br><br>

        <button type="submit">
            Entrar
        </button>

    </form>

</body>
</html>
