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
    <div class="bg-gray-900">
        <div class="pt-6">
            <nav aria-label="Breadcrumb">
                <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                    <li>
                        <div class="flex items-center">
                            <a href="#" class="mr-2 text-sm font-medium text-gray-900 dark:text-white">Jogos</a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('produtos')}}" class="mr-2 text-sm font-medium text-white">Todos os Jogos</a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>

                    <li class="text-sm">
                        <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">{{ $produto->categoria->CATEGORIA_NOME}}</a>
                    </li>
                </ol>
            </nav>

            <!-- Image gallery -->
            <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
                <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
                    <img src="{{ $produto->imagensOrdenadas[0]->IMAGEM_URL ?? '' }}" alt="Imagem do produto" class="h-full w-full object-cover object-center">
                </div>
                <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                    <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
                        <img src="{{ $produto->imagensOrdenadas[1]->IMAGEM_URL ?? '' }}" alt="Imagem do produto" class="h-full w-full object-cover object-center">
                    </div>
                    <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
                        <img src="{{ $produto->imagensOrdenadas[2]->IMAGEM_URL ?? '' }}" alt="Imagem do produto" class="h-full w-full object-cover object-center">
                    </div>
                </div>
                <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
                    <img src="{{ $produto->imagensOrdenadas[3]->IMAGEM_URL ?? '' }}" alt="Imagem do produto" class="h-full w-full object-cover object-center">
                </div>
            </div>

            <!-- Product info -->
            <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
                <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <h1 class="text-2xl font-bold tracking-tight text-white sm:text-3xl">{{$produto->PRODUTO_NOME}}</h1>
                </div>

                <!-- Options -->
                <div class="mt-4 lg:row-span-3 lg:mt-0">
                    <h2 class="sr-only">Product information</h2>
                    <p class="text-3xl tracking-tight text-white">R${{ $produto->PRODUTO_PRECO}}</p>
                    @if($produto->PRODUTO_DESCONTO > 0)
                    <p class="text-3xl tracking-tight text-white">DESCONTO: R${{ $produto->PRODUTO_DESCONTO}}</p>
                    @else

                    <p class="text-3xl tracking-tight text-white"></p>
                    @endif
                    <!-- Reviews -->
                    <div class="mt-6">
                        <h3 class="sr-only">Reviews</h3>
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <!-- Active: "text-gray-100", Default: "text-gray-800" -->
                                <svg class="text-gray-700 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                </svg>
                                <svg class="text-gray-700 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                </svg>
                                <svg class="text-gray-700 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                </svg>
                                <svg class="text-gray-700 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                </svg>
                                <svg class="text-gray-200 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="sr-only">4 out of 5 stars</p>
                            <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117 reviews</a>
                        </div>
                    </div>

                    <form class="mt-10" action="{{ route('adicionar-ao-carrinho', $produto->PRODUTO_ID) }}">
                        @csrf
                        <!-- PLATAFORMAS -->
                        <div>
                            <h3 class="text-sm font-medium text-gray-100">Plataformas Disponíveis</h3>

                            <fieldset class="mt-4">
                                <div class="flex items-center space-x-4">
                                    <img class="w-7 h-7" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Xbox_one_logo.svg/2048px-Xbox_one_logo.svg.png">

                                    <img class="w-7 h-7" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/39fd3cf6-e264-4c96-a034-e9e469461bfc/d69yvt3-5b8e9bba-2238-4b33-8e3f-619e41b71073.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzM5ZmQzY2Y2LWUyNjQtNGM5Ni1hMDM0LWU5ZTQ2OTQ2MWJmY1wvZDY5eXZ0My01YjhlOWJiYS0yMjM4LTRiMzMtOGUzZi02MTllNDFiNzEwNzMucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.xGN14P3HzTWzsLSmO5B5C2rRrxPO7cfBGTz_4O44PCY">

                                    <img class="w-10 h-7" src="https://logosmarcas.net/wp-content/uploads/2020/11/Steam-Logo.png">
                                </div>
                            </fieldset>
                        </div>



                        <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Adicionar ao Carrinho</button>
                    </form>
                </div>

                <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                    <!-- Description and details -->
                    <div>
                        <h3 class="sr-only">Description</h3>

                        <div class="space-y-6">
                            <p class="text-base text-white">{{ $produto->PRODUTO_DESC}}</p>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h3 class="text-sm font-medium text-white">Highlights</h3>

                        <div class="mt-4">
                            <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                                <li class="text-gray-400"><span class="text-gray-100">Hand cut and sewn locally</span></li>
                                <li class="text-gray-400"><span class="text-gray-100">Dyed with our proprietary colors</span></li>
                                <li class="text-gray-400"><span class="text-gray-100">Pre-washed &amp; pre-shrunk</span></li>
                                <li class="text-gray-400"><span class="text-gray-100">Ultra-soft 100% cotton</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h2 class="text-sm font-medium text-gray-900">Details</h2>

                        <div class="mt-4 space-y-6">
                            <p class="text-sm text-gray-600">The 6-Pack includes two black, two white, and two heather gray Basic Tees. Sign up for our subscription service and be the first to get new, exciting colors, like our upcoming &quot;Charcoal Gray&quot; limited release.</p>
                        </div>
                    </div>
                </div>
            </div>
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
