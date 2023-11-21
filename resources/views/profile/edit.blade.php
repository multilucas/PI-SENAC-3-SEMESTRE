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
            <li><a href="{{route('profile.edit')}}"class="text-blue-500">Perfil</a></li>
            <li><a href="{{route( 'endereco.index', Auth::id())}}"class="text-blue-500">Endereços</a></li>
            <li><a href="{{route('carrinho.index')}}" class="text-blue-500">Carrinho</a></li>
            <li><a href="{{route('pedidos.index')}}" class="text-blue-500">Pedidos</a></li>
        </ul>
    </div>
<!-- Fim Menu Lateral -->
    <div class=" max-w-md w-full mx-auto mt-18">
        <div class="bg-gray-700 dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-8 text-center ">
                <h2 class="text-2xl font-semibold">Editar Perfil</h2>
            </div>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="USUARIO_NOME">
                        Nome
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="USUARIO_NOME" value="{{ $user->USUARIO_NOME }}">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="USUARIO_EMAIL">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="USUARIO_EMAIL" value="{{ $user->USUARIO_EMAIL}}">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="USUARIO_SENHA">
                        Senha
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" name="USUARIO_SENHA" }}">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="USUARIO_CPF">
                        CPF
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="USUARIO_CPF" value="{{ $user->USUARIO_CPF}}">
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Atualizar Perfil
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
