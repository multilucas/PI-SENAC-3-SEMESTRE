<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label for="USUARIO_NOME" >Nome</label>
        <input type="text" name="USUARIO_NOME">

        <label for="USUARIO_EMAIL">Email</label>
        <input type="text" name="USUARIO_EMAIL">

        <label for="USUARIO_SENHA">Senha</label>
        <input type="text" name="USUARIO_SENHA">

        <label for="USUARIO_CPF">CPF</label>
        <input type="text" name="USUARIO_CPF">

        <button type="submit">Login</button>
    </form>
</body>
</html>
