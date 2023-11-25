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
        <!--Nav Bar-->

        <!-- Conteúdo do Carrinho -->

        <div class="bg-white">
            <div
                class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Seus Pedidos</h2>
                    <h1 class="text-3xl font-semi-bold tracking-tight text-gray-900 sm:text-4xl">{{$user->USUARIO_NOME}}</h1>

                    @foreach ($pedidos as $pedido)
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
        </div>



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
        <footer class="bg-gray-800 text-white">
            <div class="container mx-auto py-8 mt-10 flex flex-wrap justify-center">
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
</body>

</html>
