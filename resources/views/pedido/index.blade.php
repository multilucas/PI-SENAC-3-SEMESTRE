<!doctype html>
<html>

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

<body>
    <!--Nav Bar-->
    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <x-navbar :categorias='$categorias' />
    </nav>
    <!--Nav Bar-->

    <!-- Conteúdo do Carrinho -->
    @if (session('success'))
    <div class="mt-10 alert alert-successtext-3xl font-bold tracking-tight text-red-500 sm:text-4xl text-center">
        {{ session('success') }}

    </div>
@endif

    <div class="bg-white text-center ">
        <div
            class=" grid items-center gap-x-8  gap-y-16 px-4 py-5 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-1 lg:px-8 text-center">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Seus Pedidos</h2>
                <h1 class="mb-10    text-3xl font-semi-bold tracking-tight text-gray-900 sm:text-4xl">{{ $user->USUARIO_NOME }}
                </h1>

                <div
                    class=" mb-10 mx-auto p-4  -mb-20 min-w-full dark:bg-gray-800 rounded shadow-md w-full text-center">
                    <div class="overflow-x-auto mt-5 text-center">
                        <table class="min-w-full bg-white dark:bg-gray-800 rounded shadow-md text-center">
                            <thead class="text-gray-100 bg-gray-200 dark:bg-gray-700 text-center">
                                <tr class="text-center">
                                    <th class="py-3 px-6  ">Detalhes Pedido</th>
                                    <th class="py-3 px-6  ">Código do pedido</th>
                                    <th class="py-3 px-6  ">Data do Pedido</th>
                                    <th class="py-3 ">Status do Pedido</th>
                                    <th class="py-3 px-6 ">Endereço</th>

                                </tr>
                            </thead>
                            <tbody class="text-center divide-y divide-gray-300 dark:divide-gray-600 ">
                                @foreach ($pedidos as $pedido)
                                    @if ($pedido->STATUS_ID == 1)
                                        <tr class="text-white ">
                                            <td class="py-4 px-6">
                                                <a href="{{route('cancelar.pedido',['id' => $pedido->PEDIDO_ID])}}"
                                                    class="block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 mx-auto">
                                                    Cancelar Pedido
                                                </a>
                                            </td>
                                            <td class="py-4 px-6 ">#{{ $pedido->PEDIDO_ID}}</td>
                                            <td class="py-4 px-6">{{ $pedido->PEDIDO_DATA}}</td>
                                            <td class="py-4 px-6">{{ $pedido->pedidoStatus->STATUS_DESC }}</td>
                                            <td class="py-4 px-6">{{ $pedido->endereco->ENDERECO_LOGRADOURO }}- {{ $pedido->endereco->ENDERECO_NUMERO }} - {{ $pedido->endereco->ENDERECO_CIDADE }} - {{ $pedido->endereco->ENDERECO_ESTADO }}</td>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @foreach ($pedidos as $pedido)
                    @if ($pedido->STATUS_ID == 1)
                        <dl class="mt-16 grid grid-cols-1 gap-x- gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
                            <div class="border-t border-gray-200 pt-4">
                                    <dt class="font-medium text-gray-900">Código do pedido: #{{ $pedido->PEDIDO_ID }}
                                    </dt>
                                    <dt class="font-medium text-gray-900">Status do pedido:
                                        {{ $pedido->pedidoStatus->STATUS_DESC }}</dt>
                                    <form class="flex items-center" method="get"
                                        action="{{ route('cancelar.pedido',['id' => $pedido->PEDIDO_ID]) }}">
                                        @csrf
                                        <input type="hidden" name="pedido_id" value="{{ $pedido->PEDIDO_ID }}"> <button
                                            class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-700 text-sm">Cancelar Pedido</button>
                                    </form>

                            </div>
                        </dl>
                        @endif
                    @endforeach
                </div>
                <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
                </div>
            </div>
        </div> --}}



    <!-- FIM Conteúdo do Carrinho -->

    {{-- <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-semibold mb-4 text-white">Seu Carrinho</h1>

            <!-- Lista de Produtos no Carrinho -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($pedidos as $pedido)
                    @if ($pedido->STATUS_ID == 2)
                        <div class="bg-white p-6 rounded-lg shadow-md">
                        </div>
                    @else

                    @endif
                @endforeach
            </div> --}}



    <!-- INICIO FOOTER -->
    <div class="mt-20 mt-18 -mb-20 w-full">
        <footer class="bg-gray-800 text-white mt-10 ">
            <div class="container  py-8 mt-10 flex flex-wrap justify-center">
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
                        <input type="email" class="w-full py-2 px-3 bg-gray-800 text-white rounded-md"
                            placeholder="Seu e-mail">
                        <button
                            class="mt-2 bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600">Inscrever-se</button>
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
    </div>
</body>

</html>
