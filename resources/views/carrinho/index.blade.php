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
        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-semibold mb-4 text-white">Seu Carrinho</h1>

            <!-- Lista de Produtos no Carrinho -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($carrinhoItens as $carrinhoItem)
                    @if ($carrinhoItem->ITEM_QTD > 0)
                        <div class="bg-white p-6 rounded-lg shadow-md">

                            <img class="rounded-t-lg w-full h-60 cursor-pointer"
                                src="{{ $carrinhoItem->produto->imagens->first()->IMAGEM_URL }}" alt="product image" />

                            <h2 class="text-xl font-semibold mb-2">{{ $carrinhoItem->produto->PRODUTO_NOME }}</h2>

                            <!--Formulario para atualizar-->
                            <form class="flex items-center" method="get" action="{{ route('update.carrinho') }}">
                                @csrf
                                <input type="hidden" name="produto_id"
                                    value="{{ $carrinhoItem->produto->PRODUTO_ID }}">


                                <input type="number" name="quantidade_itens"
                                    value="{{ old('quantidade_itens', $carrinhoItem->ITEM_QTD) }}"
                                    class="border rounded-l px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300 mb-7">
                                <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-700 text-sm mb-7">
                                    Atualizar
                                </button>
                            </form>
                            <a class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-700 text-sm" href="{{ route('delete.carrinho', $carrinhoItem->produto->PRODUTO_ID) }} ">Remover do carrinho</a>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Button to submit the form and go to the order page -->
            <form method="post" action="{{ route('criar.pedido') }}">
                @csrf
                <!-- Escolha do Endereço -->
                <div class="container mx-auto mt-8">
                    <h2 class="text-2xl font-semibold mb-4 text-white">Escolha o endereço de entrega</h2>

                </div>

                <select name="ENDERECO_ID" id="endereco"
                    class="form-control bg-white border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal">
                    @foreach ($enderecos as $endereco)
                        <option value="{{ $endereco->ENDERECO_ID }}">
                            {{ $endereco->ENDERECO_NOME }},
                            {{ $endereco->ENDERECO_LOGRADOURO }},
                            {{ $endereco->ENDERECO_NUMERO }},
                            {{ $endereco->ENDERECO_COMPLEMENTO ? $endereco->ENDERECO_COMPLEMENTO : ' ' }},
                            {{ $endereco->ENDERECO_CEP }},
                            {{ $endereco->ENDERECO_CIDADE }} -
                            {{ $endereco->ENDERECO_ESTADO }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                    Finalizar Pedido
                </button>
            </form>
        </div>

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
