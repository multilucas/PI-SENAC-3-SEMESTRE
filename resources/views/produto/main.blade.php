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

<body >
    <!--Nav Bar-->
    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <x-navbar :categorias='$categorias' />
    </nav>
        <!--FIM Nav Bar-->
    <!-- Hero Section -->
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">GTA V: Online</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Já disponíveis para PlayStation 5 e Xbox Series X|S</p>
                <a href="#" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-3xl font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    R$ 300
                </a>
                <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Comprar agora
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="https://media-rockstargames-com.akamaized.net/tina-uploads/tina-modules/gta-v/9ca23774eb886a9dce533874723e35ce7a825f5d.png" alt="mockup">
            </div>
        </div>
    </section>
    <!-- FIM HERO SECTION -->

    <!-- CARROUSEL -->
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://images-4.gog-statics.com/b17f4cd9fb517ee48cebbf8fb6ab71482529194105c6b849c20bdaec2a06d349_bs_background_1275.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://images-4.gog-statics.com/235878cc8d3a655b7fb86c1cc3143c4090b13036596caa0a519f83bf4cbd113a_bs_background_1275.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://images-1.gog-statics.com/66d28031e0ddc6c31d914b10aa0943736c877428518223b6c73ab262819a29bb_bs_background_1275.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://images-4.gog-statics.com/d88d49721ca81cd54729caee16ad6fba9e7583ec3bcaf4ac8ccf92a9291c816a_bs_background_1275.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://images-3.gog-statics.com/42e1595de46c88fe68bc7710239a4ff4d21a510eac246950f3987affeba68e32_bs_background_1275.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    <!-- FIM Carrousel -->
    <!--PRODUTOS-->
    <div class="bg-gray-900">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-5xl dark:text-white">Lançamentos</h2>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                @foreach($produtos as $produto)
                <a href="{{ route('produto.show', ['id' => $produto->PRODUTO_ID])}}" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img class="p-8 rounded-t-lg w-full h-60 cursor-pointer" src="{{ optional($produto->imagens->first())->IMAGEM_URL }}" alt="product image">
                    </div>
                    <h3 class="mt-4 text-sm text-white">{{ $produto->PRODUTO_NOME}}</h3>
                    <p class="mt-1 text-lg font-medium text-white">{{$produto->PRODUTO_PRECO}}</p>
                </a>
                @endforeach

            </div>
        </div>
    </div>

    <!--FIM DOS PRODUTOS-->
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
