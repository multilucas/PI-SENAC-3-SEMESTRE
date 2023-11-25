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
                    },
                }
            }
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite([asset('css/app.css'), asset('js/app.js')])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
</head>

<body class="bg-gray-900 text-white justify-center h-screen dark:bg-gray-900 dark:text-gray-200">

    <!--Nav Bar-->
    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <x-navbar :categorias='$categorias' />
    </nav>
    <!--Nav Bar-->

    <div class="flex justify-center items-center w-full mt-10 mb-10">
        <div class="max-w-md w-full bg-gray-700 dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-8 text-center max-w-md w-full flex justify-center">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="mx-auto w-40 mb-4">
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="USUARIO_EMAIL">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="USUARIO_EMAIL">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-bold mb-2" for="USUARIO_SENHA">
                        Senha
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        type="password" name="USUARIO_SENHA">
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

<!--FOOTER-->
<footer class="bg-gray-800 text-white">
    <div class="container mx-auto py-8 flex flex-wrap justify-center">
        <!-- Seção de Links Rápidos -->
        <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/5 mb-6">
            <h2 class="text-xl font-semibold mb-4">Links Rápidos</h2>
            <ul>
                <li><a href="#">Início</a></li>
                <li><a href="#">Produtos</a></li>
                <li><a href="#">Sobre Nós</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </div>

        <!-- Seção de Últimas Notícias -->
        <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/5 mb-6">
            <h2 class="text-xl font-semibold mb-4">Últimas Notícias</h2>
            <ul>
                <li><a href="#">Novos Lançamentos</a></li>
                <li><a href="#">Promoções</a></li>
                <li><a href="#">Eventos</a></li>
            </ul>
        </div>

        <!-- Seção de Redes Sociais -->
        <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/5 mb-6">
            <h2 class="text-xl font-semibold mb-4">Redes Sociais</h2>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>

        <!-- Seção de Newsletter -->
        <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/5 mb-6">
            <h2 class="text-xl font-semibold mb-4">Receba nossas Novidades</h2>
            <p>Fique por dentro das últimas notícias e promoções.</p>
            <form class="mt-4">
                <input type="email" class="w-full py-2 px-3 bg-gray-800 text-white rounded-md" placeholder="Seu e-mail">
                <button class="mt-2 bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600">Inscrever-se</button>
            </form>
        </div>
    </div>

    <!-- Rodapé Inferior -->
    <div class="bg-gray-800 py-2">
        <div class="container mx-auto text-sm text-center">
            &copy; 2023 Seu E-commerce de Games. Todos os direitos reservados.
        </div>
    </div>
</footer>


</body>

</html>
