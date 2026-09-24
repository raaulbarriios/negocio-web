@extends('layouts.app')

@section('title', 'Catálogo de Productos - Overdrive Games Algeciras')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Encabezado del Catálogo con Buscador y Filtros -->
    <div class="border-b border-slate-800 pb-6 mb-8">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-6">
            <div>
                <span class="badge-blue mb-2 inline-block">Catálogo Interactivo 2026</span>
                <h1 class="text-3xl font-extrabold text-white">Catálogo de Videojuegos & Hardware</h1>
                <p class="text-slate-400 text-xs mt-1">
                    Filtra por plataforma o busca tu juego preferido con disponibilidad inmediata en Algeciras.
                </p>
            </div>

            <!-- Formularios de Búsqueda Directa en la Pestaña de Catálogo -->
            <form action="{{ route('catalog') }}" method="GET" class="flex items-center gap-2 w-full lg:w-auto">
                @if($selectedPlatform !== 'Todas')
                    <input type="hidden" name="platform" value="{{ $selectedPlatform }}">
                @endif
                
                <div class="relative flex-grow lg:w-72 bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 flex items-center focus-within:border-blue-500 transition-colors">
                    <svg class="w-4 h-4 text-slate-400 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" name="search" value="{{ $searchQuery }}" placeholder="Buscar por título, género..." class="bg-transparent text-xs text-white placeholder-slate-400 focus:outline-none w-full">
                    @if($searchQuery !== '')
                        <a href="{{ route('catalog', ['platform' => $selectedPlatform]) }}" class="text-xs text-slate-400 hover:text-white font-bold ml-1">✕</a>
                    @endif
                </div>

                <button type="submit" class="btn-primary text-xs py-2 px-4 shrink-0">
                    Buscar
                </button>
            </form>
        </div>

        <!-- Filtro Interactivo por Etiquetas de Plataforma -->
        <div class="flex flex-wrap items-center justify-between gap-3 pt-4 border-t border-slate-800/60">
            <div class="flex flex-wrap items-center gap-2">
                <span class="text-xs font-bold text-slate-400 mr-1">Filtrar por plataforma:</span>
                @foreach($platforms as $platform)
                    @php
                        $isActive = ($selectedPlatform === $platform);
                        $queryParams = array_filter([
                            'platform' => ($platform === 'Todas') ? null : $platform,
                            'search' => $searchQuery ?: null,
                        ]);
                    @endphp
                    <a href="{{ route('catalog', $queryParams) }}" 
                       class="px-3 py-1.5 rounded text-xs font-semibold transition-colors flex items-center gap-1.5 {{ $isActive ? 'bg-blue-600 text-white font-bold shadow-sm' : 'bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white' }}">
                        <span>{{ $platform }}</span>
                        @if($isActive && $platform !== 'Todas')
                            <span class="text-[10px] opacity-80">✓</span>
                        @endif
                    </a>
                @endforeach
            </div>

            <!-- Indicadores de Filtros Activos y Botón de Limpiar -->
            @if($selectedPlatform !== 'Todas' || $searchQuery !== '')
                <div class="flex items-center gap-2">
                    <span class="text-xs text-slate-400">Filtros activos</span>
                    <a href="{{ route('catalog') }}" class="text-xs text-rose-400 hover:text-rose-300 underline font-semibold">
                        Limpiar todos los filtros
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Grid de Productos Filtrados -->
    @if(count($products) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @foreach($products as $product)
                <div class="game-card">
                    <div class="card-img-wrapper h-80">
                        <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}">
                        <div class="absolute top-3 left-3">
                            <span class="badge-emerald">{{ $product['badge'] }}</span>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <div class="flex items-center justify-between text-xs text-slate-400 mb-1">
                            <span class="font-bold text-blue-400 uppercase tracking-wider">{{ $product['category'] }}</span>
                            <span class="text-amber-400 font-bold">★ {{ $product['rating'] }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2 leading-snug">{{ $product['title'] }}</h3>
                        <p class="text-xs text-slate-400 leading-relaxed mb-4 flex-grow">
                            {{ $product['description'] }}
                        </p>

                        <div class="bg-slate-900/90 rounded p-2.5 mb-4 border border-slate-800 text-[11px] text-slate-300">
                            <span class="text-slate-500 block">Plataformas compatibles:</span>
                            <span class="font-semibold text-white">{{ $product['platform'] }}</span>
                        </div>

                        <div class="pt-3 border-t border-slate-800 flex items-center justify-between mt-auto">
                            <div class="flex flex-col">
                                <span class="text-[10px] text-slate-400 uppercase">PVP Oficial</span>
                                <span class="text-xl font-extrabold text-white">{{ $product['price'] }}</span>
                            </div>
                            <a href="{{ $product['external_link'] }}" target="_blank" rel="noopener noreferrer" class="btn-primary text-xs py-2 px-3">
                                <span>Ver Ficha & Compra</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Estado Vacío cuando no se encuentran resultados -->
        <div class="bg-[#1e293b] border border-slate-800 rounded-xl p-12 text-center mb-12">
            <div class="w-12 h-12 rounded-full bg-slate-800 text-slate-400 flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                🔍
            </div>
            <h3 class="text-lg font-bold text-white mb-2">No se encontraron resultados</h3>
            <p class="text-xs text-slate-400 max-w-md mx-auto mb-6 leading-relaxed">
                No hemos encontrado ningún videojuego o accesorio que coincida con tus criterios de búsqueda 
                @if($searchQuery !== '') <strong>"{{ $searchQuery }}"</strong> @endif
                @if($selectedPlatform !== 'Todas') para la plataforma <strong>{{ $selectedPlatform }}</strong> @endif.
            </p>
            <a href="{{ route('catalog') }}" class="btn-primary text-xs">
                Ver todos los productos del catálogo
            </a>
        </div>
    @endif

    <!-- Especificaciones de Calidad y Plan Renove en Algeciras -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
        <div class="spec-list">
            <h3 class="text-lg font-bold text-white mb-1">Garantías de Calidad en Overdrive Games</h3>
            <p class="text-xs text-slate-400 mb-4">
                Compromiso de calidad aplicado a todos nuestros productos vendidos en tienda y web.
            </p>

            <ol type="1">
                <li>
                    <h4 class="text-xs font-bold text-white">Ediciones Oficiales en España</h4>
                    <p class="text-xs text-slate-400">Ediciones físicas 100% precintadas con carátula e idioma oficial distribuidos en España.</p>
                </li>
                <li>
                    <h4 class="text-xs font-bold text-white">3 Años de Cobertura Directa</h4>
                    <p class="text-xs text-slate-400">Gestión de garantía simplificada directamente en nuestro local de Calle Regino Martínez 18 (Algeciras).</p>
                </li>
                <li>
                    <h4 class="text-xs font-bold text-white">Prueba e Inspección de Periféricos</h4>
                    <p class="text-xs text-slate-400">Verificación de gatillos y conectividad antes de la entrega para mandos y auriculares pro.</p>
                </li>
                <li>
                    <h4 class="text-xs font-bold text-white">Protección Especial en Envíos</h4>
                    <p class="text-xs text-slate-400">Cajas acolchadas para evitar cualquier daño en esquinas de juegos físicos y ediciones especiales.</p>
                </li>
            </ol>
        </div>

        <!-- Plan Renove de Juegos Usados en Algeciras -->
        <div class="bg-[#1e293b] border border-slate-800 rounded-xl p-6 flex flex-col justify-between">
            <div>
                <span class="badge-blue mb-2 inline-block">Plan Renove Algeciras</span>
                <h3 class="text-lg font-bold text-white mb-2">Vende o Cambia tus Juegos Usados</h3>
                <p class="text-xs text-slate-300 leading-relaxed mb-4">
                    ¿Quieres renovar tu colección? Trae tus juegos usados de PS4, PS5, Xbox o Nintendo Switch a nuestra tienda de Calle Ancha en Algeciras y te daremos metálico o saldo web al instante.
                </p>

                <h4 class="text-xs font-bold text-blue-400 uppercase tracking-wider mb-2">Ventajas del servicio de tasación local:</h4>
                <ul class="feature-list text-xs mb-4">
                    @foreach($advantages as $advantage)
                        <li>{{ $advantage }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="p-3 bg-slate-900 rounded border border-slate-800 flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold text-white block">¿Tienes dudas sobre la tasación?</span>
                    <span class="text-[11px] text-slate-400">Contacta con nuestros especialistas en Algeciras</span>
                </div>
                <a href="{{ route('about') }}" class="btn-secondary text-xs py-1.5 px-3">Contacto</a>
            </div>
        </div>
    </section>

    <!-- Verificadores y Enlaces de Editores -->
    <section class="border-t border-slate-800 pt-8 text-center">
        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-4">Tiendas Digitales y Editores Oficiales</h3>
        <div class="flex flex-wrap justify-center gap-3 text-xs">
            <a href="https://store.playstation.com" target="_blank" rel="noopener noreferrer" class="btn-external">
                <span>PlayStation Store España</span>
            </a>
            <a href="https://www.xbox.com/es-ES/games" target="_blank" rel="noopener noreferrer" class="btn-external">
                <span>Xbox Store España</span>
            </a>
            <a href="https://www.nintendo.es/nintendo-eshop" target="_blank" rel="noopener noreferrer" class="btn-external">
                <span>Nintendo eShop España</span>
            </a>
        </div>
    </section>

</div>
@endsection
