@extends('layouts.app')

@section('title', 'Inicio - Overdrive Games | Tienda de Videojuegos en Algeciras')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Hero Banner Principal -->
    <section class="hero-banner relative mb-12">
        <img src="{{ asset('images/hero-banner.jpg') }}" alt="Tienda Overdrive Games Algeciras" class="w-full h-[420px] object-cover">
        <div class="absolute inset-0 hero-overlay flex flex-col justify-end p-8 md:p-12">
            <div class="max-w-2xl">
                <span class="badge-blue mb-3 inline-block">Tu Tienda Gamer en Algeciras</span>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight mb-3">
                    Lanzamientos, consolas y accesorios en pleno centro de Algeciras
                </h1>
                <p class="text-slate-300 text-sm leading-relaxed mb-6">
                    Encuentra los videojuegos más esperados para PS5, Xbox Series X, Nintendo Switch y PC. Visítanos en Calle Regino Martínez 18 (Calle Ancha) o pide online con envío express.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('catalog') }}" class="btn-primary text-xs">
                        <span>Ver Catálogo de Juegos</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                    <a href="{{ route('about') }}" class="btn-secondary text-xs">
                        <span>Ubicación Calle Ancha</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Categorías de Productos -->
    <section class="mb-12">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-white">Categorías Destacadas</h2>
                <p class="text-xs text-slate-400">Juegos físicos, consolas y accesorios oficiales en Algeciras</p>
            </div>
            <a href="{{ route('catalog') }}" class="text-xs font-semibold text-blue-400 hover:underline">Ver catálogo →</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($categories as $category)
                <div class="bg-[#1e293b] border border-slate-800 rounded-lg p-5 hover:border-blue-500/40 transition-all cursor-pointer">
                    <div class="w-10 h-10 rounded bg-blue-600/15 border border-blue-500/30 text-blue-400 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5zM5 13a2 2 0 00-2 2v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 00-2-2H5z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-white text-sm mb-1">{{ $category['name'] }}</h3>
                    <p class="text-xs text-slate-400">{{ $category['count'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Juegos Destacados -->
    <section class="mb-12">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-white">Novedades & Juegos Destacados</h2>
                <p class="text-xs text-slate-400">Títulos reales con stock disponible en tienda</p>
            </div>
            <span class="badge-emerald">Garantía Oficial en España</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredGames as $game)
                <div class="game-card">
                    <div class="card-img-wrapper h-80">
                        <img src="{{ asset($game['image']) }}" alt="{{ $game['title'] }}">
                        <div class="absolute top-3 right-3">
                            <span class="badge-blue">{{ $game['badge'] }}</span>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <div class="flex items-center justify-between text-xs text-slate-400 mb-2">
                            <span>{{ $game['category'] }}</span>
                            <span class="text-amber-400 font-bold">★ {{ $game['rating'] }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2 leading-snug">{{ $game['title'] }}</h3>
                        <p class="text-xs text-slate-400 leading-relaxed mb-4 flex-grow">
                            {{ $game['description'] }}
                        </p>
                        <div class="text-[11px] text-blue-300 font-medium mb-3">
                            Plataformas: {{ $game['platform'] }}
                        </div>
                        <div class="pt-3 border-t border-slate-800 flex items-center justify-between mt-auto">
                            <span class="text-xl font-extrabold text-white">{{ $game['price'] }}</span>
                            <div class="flex items-center gap-2">
                                <a href="{{ $game['external_link'] }}" target="_blank" rel="noopener noreferrer" class="btn-external" title="Ver web oficial">
                                    <span>Web Oficial</span>
                                </a>
                                <a href="{{ route('catalog') }}" class="btn-primary text-xs py-2 px-3">Comprar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Lista de Servicios y Ventajas -->
    <section class="bg-[#1e293b] border border-slate-800 rounded-xl p-6 md:p-10 mb-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-blue-400 mb-2 block">Garantía & Servicios Locales</span>
                <h2 class="text-2xl font-bold text-white mb-3">¿Por qué elegir Overdrive Games Algeciras?</h2>
                <p class="text-slate-300 text-sm leading-relaxed mb-4">
                    Somos la tienda referente para los amantes de los videojuegos en el Campo de Gibraltar. Ofrecemos atención cercana, catálogo actualizado y servicio técnico oficial.
                </p>

                <!-- Lista de Elementos (Requisito: Listas) -->
                <ul class="feature-list mb-6">
                    @foreach($storeServices as $service)
                        <li>{{ $service }}</li>
                    @endforeach
                </ul>

                <a href="{{ route('about') }}" class="btn-secondary text-xs">
                    <span>Ver datos de la tienda física</span>
                </a>
            </div>

            <div class="rounded-lg overflow-hidden border border-slate-700">
                <img src="{{ asset('images/store-interior.jpg') }}" alt="Instalaciones de Overdrive Games en Algeciras" class="w-full h-72 object-cover">
            </div>
        </div>
    </section>

    <!-- Enlaces Externos de Análisis y Prensa Especializada -->
    <section class="border-t border-slate-800 pt-8">
        <h3 class="text-center text-xs font-bold uppercase tracking-wider text-slate-400 mb-4">Prensa Especializada y Portales Oficiales</h3>
        <div class="flex flex-wrap justify-center items-center gap-6 md:gap-10 text-xs">
            <a href="https://www.ign.com/es" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-blue-400 font-semibold flex items-center gap-1">
                <span>IGN España</span>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
            <a href="https://www.eurogamer.es" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-blue-400 font-semibold flex items-center gap-1">
                <span>Eurogamer.es</span>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
            <a href="https://www.3djuegos.com" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-blue-400 font-semibold flex items-center gap-1">
                <span>3DJuegos</span>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
            <a href="https://vandal.elespanol.com" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-blue-400 font-semibold flex items-center gap-1">
                <span>Vandal Videojuegos</span>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
        </div>
    </section>

</div>
@endsection
