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
    <!-- Menu Lateral -->
    <div class="ml-10 w-1/4 bg-gray-800 p-4">
        <!-- Conteúdo do menu lateral -->
        <h2 class="text-2xl font-semibold mb-4">Informações Usuário</h2>
        <ul>
            <li><a href="{{route('profile.edit')}}">Perfil</a></li>
            <li><a href="{{route( 'endereco.edit')}}">Endereços</a></li>
            <li><a href="#">Carrinho</a></li>
        </ul>
    </div>
    <div class=" max-w-md w-full mx-auto">
        <div class="bg-gray-700 dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-semibold">Editar Perfil</h2>
            </div>
        </div>
    </div>
</body>

</html>