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
    <div class="ml-4 w-1/4 bg-gray-800 p-4">
        <!-- Conteúdo do menu lateral -->
        <h2 class="text-2xl font-semibold mb-4">Informações do Usuário</h2>
        <ul>
            <li><a href="{{ route('profile.edit') }}" class="text-blue-500">Perfil</a></li>
            <li><a href="{{ route('endereco.index', Auth::id()) }}" class="text-blue-500">Endereços</a></li>
            <li><a href="#" class="text-blue-500">Carrinho</a></li>
        </ul>
    </div>

    <div class="max-w-screen-md mx-auto p-4">
        <div class="bg-gray-700 dark:bg-gray-800 shadow-md rounded p-8 mb-4">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-semibold">Editar Perfil</h2>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 rounded shadow-md">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="py-3 px-6 text-left">Editar</th>
                        <th class="py-3 px-6 text-left">Nome do Endereço</th>
                        <th class="py-3 px-6 text-left">Logradouro</th>
                        <th class="py-3 px-6 text-left">Número</th>
                        <th class="py-3 px-6 text-left">Complemento</th>
                        <th class="py-3 px-6 text-left">CEP</th>
                        <th class="py-3 px-6 text-left">Cidade</th>
                        <th class="py-3 px-6 text-left">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300 dark:divide-gray-600">
                    @foreach ($enderecosUsuario as $endereco)
                    <tr>
                        <td class="py-4 px-6">
                            <a href="{{ route('endereco.editar', $endereco->ENDERECO_ID) }}" class="block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                Editar
                            </a>
                        </td>
                        <td class="py-4 px-6">{{ $endereco->ENDERECO_NOME }}</td>
                        <td class="py-4 px-6">{{ $endereco->ENDERECO_LOGRADOURO }}</td>
                        <td class="py-4 px-6">{{ $endereco->ENDERECO_NUMERO }}</td>
                        <td class="py-4 px-6">{{ $endereco->ENDERECO_COMPLEMENTO ?? " " }}</td>
                        <td class="py-4 px-6">{{ $endereco->ENDERECO_CEP }}</td>
                        <td class="py-4 px-6">{{ $endereco->ENDERECO_CIDADE }}</td>
                        <td class="py-4 px-6">{{ $endereco->ENDERECO_ESTADO }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('endereco.create') }}" class="block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            Novo Endereço
        </a>
    </div>
</body>

</html>
