@extends('layouts.app')

@section('title', 'Sobre Nosotros - Overdrive Games | Calle Ancha 18, Algeciras')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Encabezado -->
    <div class="border-b border-slate-800 pb-6 mb-8">
        <span class="badge-blue mb-2 inline-block">Tienda Física en Algeciras</span>
        <h1 class="text-3xl font-extrabold text-white">Sobre Overdrive Games</h1>
        <p class="text-slate-400 text-xs mt-1 max-w-xl">
            Conoce nuestra tienda física en la céntrica Calle Ancha de Algeciras, nuestro equipo técnico y los servicios que ofrecemos al Campo de Gibraltar.
        </p>
    </div>

    <!-- Sección de Historia y Ubicación -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mb-12">
        <div>
            <h2 class="text-xl font-bold text-white mb-3">La Tienda Gamer de Referencia en Algeciras</h2>
            
            <p class="text-slate-300 text-sm leading-relaxed mb-4">
                Overdrive Games nació en 2017 en pleno corazón de Algeciras, en la conocida Calle Ancha (Calle Regino Martínez 18), ofreciendo un espacio cercano e independiente para los amantes de los videojuegos.
            </p>

            <p class="text-slate-300 text-sm leading-relaxed mb-4">
                Nos especializamos en la venta de títulos nuevos precintados, asesoramiento técnico, consolas de última generación y un servicio local de reparación de mandos y consolas con repuestos oficiales.
            </p>

            <!-- Lista de Valores -->
            <h3 class="text-xs font-bold text-blue-400 uppercase tracking-wider mb-2">Nuestros Compromisos Locales:</h3>
            <ul class="feature-list text-xs mb-6">
                <li>Garantía legal oficial de 3 años en todas las consolas y accesorios.</li>
                <li>Juegos físicos 100% precintados con carátula e idioma en castellano.</li>
                <li>Tasación justa e inmediata para juegos de segunda mano en el centro de Algeciras.</li>
                <li>Envíos en 24h para Algeciras, San Roque, Los Barrios, La Línea y Tarifa.</li>
            </ul>

            <!-- Enlace externo a la ubicación en Google Maps -->
            <a href="https://maps.google.com/?q=Calle+Regino+Mart%C3%ADnez+18+Algeciras" target="_blank" rel="noopener noreferrer" class="btn-external">
                <span>📍 Ubicación en Google Maps (Calle Regino Martínez 18, Algeciras)</span>
                <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
        </div>

        <div class="space-y-6">
            <div class="rounded-lg overflow-hidden border border-slate-700">
                <img src="{{ asset('images/store-interior.jpg') }}" alt="Interior de Overdrive Games en Calle Ancha Algeciras" class="w-full h-72 object-cover">
            </div>

            <!-- Ficha de Datos de la Tienda -->
            <div id="contacto" class="bg-[#1e293b] border border-slate-800 rounded-lg p-6">
                <h3 class="text-sm font-bold text-white mb-3 border-b border-slate-800 pb-2">Datos de Contacto & Tienda Física</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-slate-400 block">Dirección Física:</span>
                        <span class="font-semibold text-white">{{ $storeInfo['location'] }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Teléfono de Tienda:</span>
                        <span class="font-semibold text-blue-400">{{ $storeInfo['phone'] }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Email de Atención:</span>
                        <span class="font-semibold text-blue-400">{{ $storeInfo['email'] }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Horario Comercial:</span>
                        <span class="font-semibold text-white">{{ $storeInfo['hours'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Equipo -->
    <section class="mb-12">
        <h2 class="text-xl font-bold text-white mb-1">Equipo de Overdrive Games Algeciras</h2>
        <p class="text-xs text-slate-400 mb-6">Personal de tienda con años de experiencia en el sector gamer</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($team as $member)
                <div class="bg-[#1e293b] border border-slate-800 rounded-lg p-5">
                    <div class="w-10 h-10 rounded bg-blue-600/20 text-blue-400 font-bold flex items-center justify-center mb-3 text-sm">
                        {{ substr($member['name'], 0, 1) }}
                    </div>
                    <h3 class="text-sm font-bold text-white mb-1">{{ $member['name'] }}</h3>
                    <p class="text-xs text-blue-400 font-medium mb-1">{{ $member['role'] }}</p>
                    <p class="text-[11px] text-slate-400">{{ $member['experience'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Preguntas Frecuentes -->
    <section id="faq" class="bg-[#1e293b] border border-slate-800 rounded-lg p-6 md:p-8 mb-10">
        <h2 class="text-xl font-bold text-white mb-1">Preguntas Frecuentes (FAQ)</h2>
        <p class="text-xs text-slate-400 mb-6">Respuestas a las consultas más habituales de nuestros clientes en Algeciras.</p>

        <div class="space-y-4">
            @foreach($faqs as $question => $answer)
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="text-xs font-bold text-blue-300 mb-1 flex items-center gap-1.5">
                        <span class="text-slate-500">P:</span>
                        <span>{{ $question }}</span>
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed pl-5">
                        {{ $answer }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Enlaces Externos -->
    <section class="border-t border-slate-800 pt-6 text-center">
        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Redes y Medios Oficiales</h3>
        <div class="flex flex-wrap justify-center gap-4 text-xs">
            <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-white flex items-center gap-1 font-medium">
                <span>YouTube Oficial</span>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
            <a href="https://www.twitter.com" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-white flex items-center gap-1 font-medium">
                <span>Canal X (Twitter)</span>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
        </div>
    </section>

</div>
@endsection
