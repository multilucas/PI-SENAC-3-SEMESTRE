<!DOCTYPE html>
<html class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite([asset('css/app.css'), asset('js/app.js')])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
</head>

<body class="bg-gray-900 text-white flex items-center justify-center h-screen dark:bg-gray-900 dark:text-gray-200">
    <!--Nav Bar-->
    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 fixed top-0 w-full">
        <x-navbar :categorias='$categorias' />
    </nav>
        <!--FIM Nav Bar-->

    <!-- Menu Lateral -->
    <div class="ml-10 w-1/4 bg-gray-800 p-4">
        <!-- Conteúdo do menu lateral -->
        <h2 class="text-2xl font-semibold mb-4">Informações Usuário</h2>
        <ul>
            <li><a href="{{route('profile.edit')}}">Perfil</a></li>
            <li><a href="{{route( 'endereco.index', Auth::id() )}}">Endereços</a></li>
            <li><a href="#">Carrinho</a></li>
        </ul>
    </div>

<div class="max-w-md w-full mx-auto mt-16">
    <div class="bg-gray-700 dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-8 text-center">
            <h2 class="text-2xl font-semibold">Adicione um endereço de entrega</h2>
        </div>
        <form method="POST" action="{{ route('endereco.store', Auth::id()) }}">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <!-- Primeira Coluna -->
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="ENDERECO_NOME">
                        Nome do Endereço
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="ENDERECO_NOME">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="ENDERECO_LOGRADOURO">
                        Logradouro
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="ENDERECO_LOGRADOURO">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="ENDERECO_NUMERO">
                        Numero
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="ENDERECO_NUMERO">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="ENDERECO_COMPLEMENTO">
                        Complemento
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="ENDERECO_COMPLEMENTO">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="ENDERECO_CEP">
                        CEP
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="ENDERECO_CEP">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="ENDERECO_CIDADE">
                        Cidade
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="ENDERECO_CIDADE">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="ENDERECO_ESTADO">
                        Estado
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="ENDERECO_ESTADO">
                </div>
            </div>

            <!-- BOTAO DE ENVIO -->
            <div class="flex items-center justify-end mt-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Salvar Informações
                </button>
            </div>
        </form>
    </div>
</div>

</body>

</html>
