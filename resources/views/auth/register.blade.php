<!DOCTYPE html>
<html class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white flex items-center justify-center h-screen dark:bg-gray-900 dark:text-gray-200">
    <div class="max-w-md w-full">
        <div class="bg-gray-700 dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-semibold">Registre-se</h2>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="USUARIO_NOME">
                        Nome
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline" type="text" name="USUARIO_NOME">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="USUARIO_EMAIL">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline" type="text" name="USUARIO_EMAIL">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="USUARIO_SENHA">
                        Senha
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" name="USUARIO_SENHA">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="USUARIO_CPF">
                        CPF
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="text" name="USUARIO_CPF">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Registro
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
