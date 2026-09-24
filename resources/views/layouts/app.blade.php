<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Overdrive Games - Tu tienda física de videojuegos en Algeciras (Calle Ancha). Consolas, lanzamientos PS5, Xbox, Switch, accesorios y servicio técnico local.">
    <title>@yield('title', 'Overdrive Games - Tienda de Videojuegos en Algeciras')</title>
    
    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0f172a] text-slate-100 flex flex-col min-h-screen">

    <!-- Header / Navbar común -->
    <header class="nav-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Logo & Brand Name -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center font-black text-white shadow-md group-hover:bg-blue-500 transition-colors">
                    OD
                </div>
                <div class="flex flex-col">
                    <span class="text-lg font-extrabold tracking-tight text-white">OVERDRIVE GAMES</span>
                    <span class="text-[10px] tracking-wider text-slate-400 uppercase font-semibold">Algeciras • Calle Ancha 18</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center space-x-1">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <span>Inicio</span>
                </a>
                <a href="{{ route('catalog') }}" class="nav-link {{ request()->routeIs('catalog') ? 'active' : '' }}">
                    <span>Catálogo de Juegos</span>
                </a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    <span>Sobre Nosotros</span>
                </a>
            </nav>

            <!-- Action Area: Disabled Cart -->
            <div class="flex items-center">
                <!-- Botón de carrito deshabilitado -->
                <button type="button" class="bg-slate-800/80 p-2.5 rounded-lg border border-slate-700/80 flex items-center justify-center relative opacity-70 cursor-not-allowed select-none" title="Carrito fuera de servicio temporalmente" aria-label="Carrito de compras fuera de servicio">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-slate-600 text-slate-300 text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center">0</span>
                </button>
            </div>

        </div>

        <!-- Mobile Navigation bar -->
        <div class="md:hidden border-t border-slate-800 bg-slate-900 px-4 py-2 flex justify-around text-xs">
            <a href="{{ route('home') }}" class="py-2 text-slate-300 font-medium {{ request()->routeIs('home') ? 'text-blue-400 font-bold' : '' }}">Inicio</a>
            <a href="{{ route('catalog') }}" class="py-2 text-slate-300 font-medium {{ request()->routeIs('catalog') ? 'text-blue-400 font-bold' : '' }}">Catálogo</a>
            <a href="{{ route('about') }}" class="py-2 text-slate-300 font-medium {{ request()->routeIs('about') ? 'text-blue-400 font-bold' : '' }}">Nosotros</a>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer común -->
    <footer class="footer-main">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                
                <!-- Columna 1: Información de la tienda -->
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-7 h-7 rounded bg-blue-600 text-white font-bold flex items-center justify-center text-xs">OD</div>
                        <span class="text-base font-bold text-white tracking-tight">Overdrive Games</span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        Tu tienda especialista en videojuegos y consolas en Algeciras. Visítanos en Calle Ancha o haz tu pedido online con envío en 24h para el Campo de Gibraltar y toda la península.
                    </p>
                    <p class="text-xs text-slate-300 flex items-center gap-1.5">
                        <span>📍 Calle Regino Martínez 18 (Calle Ancha), 11201 Algeciras (Cádiz)</span>
                    </p>
                </div>

                <!-- Columna 2: Navegación interna -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-blue-500 pl-2">Secciones</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('home') }}" class="footer-link">Inicio</a></li>
                        <li><a href="{{ route('catalog') }}" class="footer-link">Catálogo de Productos</a></li>
                        <li><a href="{{ route('about') }}" class="footer-link">Tienda Física & Contacto</a></li>
                        <li><a href="{{ route('about') }}#faq" class="footer-link">Preguntas Frecuentes</a></li>
                    </ul>
                </div>

                <!-- Columna 3: Enlaces Externos Oficiales -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-emerald-500 pl-2">Sitios Oficiales</h4>
                    <ul class="space-y-2 text-xs">
                        <li>
                            <a href="https://store.playstation.com" target="_blank" rel="noopener noreferrer" class="footer-link flex items-center gap-1.5">
                                <span>PlayStation Store España</span>
                                <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.xbox.com/es-ES" target="_blank" rel="noopener noreferrer" class="footer-link flex items-center gap-1.5">
                                <span>Xbox España</span>
                                <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.nintendo.es" target="_blank" rel="noopener noreferrer" class="footer-link flex items-center gap-1.5">
                                <span>Nintendo España</span>
                                <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.ign.com/es" target="_blank" rel="noopener noreferrer" class="footer-link flex items-center gap-1.5">
                                <span>IGN España</span>
                                <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Columna 4: Newsletter -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-amber-500 pl-2">Novedades Overdrive</h4>
                    <p class="text-xs text-slate-400 mb-3">Recibe ofertas y avisos de stock de consolas en Algeciras.</p>
                    <div class="flex flex-col gap-2">
                        <input type="email" placeholder="Tu correo electrónico..." class="bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-blue-500">
                        <button class="btn-primary text-xs py-2 justify-center">Suscribirme</button>
                    </div>
                </div>

            </div>

            <!-- Separador e Información Legal -->
            <div class="pt-6 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <p>© {{ date('Y') }} Overdrive Games S.L. Todos los derechos reservados. Proyecto desarrollado con Laravel.</p>
                <div class="flex space-x-4">
                    <span class="hover:text-slate-400 cursor-pointer">Aviso Legal</span>
                    <span class="hover:text-slate-400 cursor-pointer">Política de Privacidad</span>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
