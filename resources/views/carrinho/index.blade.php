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

<body x-data="{ isCartOpen: false }">
    <!--Nav Bar-->
    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center">
                <img src="{{ asset('img/logo.png')}}" class="h-20 mr-3" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Alpha Games</span>
            </a>
            <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Carrinho</a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Store
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Todos os jogos</a>
                                </li>
                                <!-- dropdown MENU -->


                                <li aria-labelledby="dropdownNavbarLink">
                                    <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Categorias
                                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>

                                    <div id="doubleDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton">
                                            @foreach($categorias as $categoria)
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $categoria->CATEGORIA_NOME}}</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                </li>
                            </ul>
                            <div class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                @auth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">Sign Out</button>
                                </form>
                                @endauth

                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="#" x-on:click="isCartOpen = true" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                    </li>
                </ul>
            </div>
        </div>
        </div>

        <!-- Conteúdo do Carrinho -->
        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-semibold mb-4">Seu Carrinho</h1>

            <!-- Lista de Produtos no Carrinho -->
           <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($carrinhoItens as $carrinhoItem)
                <div class="bg-white p-6 rounded-lg shadow-md">

                    <img class="p-8 rounded-t-lg w-full h-60 cursor-pointer" src="{{$carrinhoItem->produto->imagens->first()->IMAGEM_URL}}" alt="product image" />

                    <h2 class="text-xl font-semibold mb-2">{{ $carrinhoItem->produto->PRODUTO_NOME }}</h2>
                    <p class="text-gray-600 mb-4">{{ $carrinhoItem->produto->PRODUTO_DESCRICAO }}</p>
                    <p class="text-gray-800 font-bold">{{ $carrinhoItem->produto->PRODUTO_PRECO}}</p>
                </div>
                @endforeach
            </div>

        </div>

        <!-- INICIO FOOTER -->
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
