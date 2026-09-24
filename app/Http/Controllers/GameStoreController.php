<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class GameStoreController extends Controller
{
    /**
     * Catálogo con juegos y hardware reales.
     */
    private function getCatalogData(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Grand Theft Auto VI',
                'category' => 'Acción / Mundo Abierto',
                'platform' => 'PlayStation 5, Xbox Series X',
                'price' => '79.99 €',
                'badge' => 'Reserva Oficial',
                'image' => 'images/gta6.jpg',
                'rating' => '9.9/10',
                'description' => 'Regresa a Vice City en el lanzamiento más esperado de Rockstar Games. Reserva en nuestra tienda de Algeciras y asegura tu DLC exclusivo.',
                'publisher' => 'Rockstar Games',
                'external_link' => 'https://www.rockstargames.com/VI',
            ],
            [
                'id' => 2,
                'title' => 'The Legend of Zelda: Tears of the Kingdom',
                'category' => 'Aventura / Acción',
                'platform' => 'Nintendo Switch',
                'price' => '64.99 €',
                'badge' => 'Top Ventas',
                'image' => 'images/zelda.jpg',
                'rating' => '9.8/10',
                'description' => 'Explora los cielos y tierras de Hyrule en la obra maestra de Nintendo. Disponible en tienda física y con entrega express en el Campo de Gibraltar.',
                'publisher' => 'Nintendo',
                'external_link' => 'https://www.nintendo.es/Juegos/Juegos-de-Nintendo-Switch/The-Legend-of-Zelda-Tears-of-the-Kingdom-1576884.html',
            ],
            [
                'id' => 3,
                'title' => 'Elden Ring: Shadow of the Erdtree',
                'category' => 'Action RPG / Fantasía Oscura',
                'platform' => 'PlayStation 5, Xbox Series X, PC Gaming',
                'price' => '69.99 €',
                'badge' => 'Edición Especial',
                'image' => 'images/eldenring.jpg',
                'rating' => '9.7/10',
                'description' => 'La aclamada expansión de FromSoftware. Edición física con caja reinforced y garantía oficial en nuestra tienda de Algeciras.',
                'publisher' => 'Bandai Namco / FromSoftware',
                'external_link' => 'https://en.bandainamcoent.eu/elden-ring/elden-ring',
            ],
            [
                'id' => 4,
                'title' => 'Final Fantasy VII Rebirth',
                'category' => 'RPG / Fantasía',
                'platform' => 'PlayStation 5',
                'price' => '79.99 €',
                'badge' => 'Exclusivo PS5',
                'image' => 'images/ff7.jpg',
                'rating' => '9.6/10',
                'description' => 'La inolvidable aventura de Cloud y sus compañeros a través del vasto planeta fuera de Midgar. Edición disco con carátula en castellano.',
                'publisher' => 'Square Enix',
                'external_link' => 'https://ffvii-rebirth.square-enix-games.com/es-es/',
            ],
            [
                'id' => 5,
                'title' => 'Super Mario Bros. Wonder',
                'category' => 'Plataformas / Familiar',
                'platform' => 'Nintendo Switch',
                'price' => '59.99 €',
                'badge' => 'Recomendado',
                'image' => 'images/mario.jpg',
                'rating' => '9.5/10',
                'description' => 'Disfruta de la locura de las Flores Maravilla en el Reino Flor. Ideal para jugar en solitario o en cooperativo de hasta 4 jugadores.',
                'publisher' => 'Nintendo',
                'external_link' => 'https://www.nintendo.es/Juegos/Juegos-de-Nintendo-Switch/Super-Mario-Bros-Wonder-2404150.html',
            ],
            [
                'id' => 6,
                'title' => 'Mando DualSense Wireless PS5 (Midnight Black)',
                'category' => 'Hardware & Mandos',
                'platform' => 'PlayStation 5, PC Gaming',
                'price' => '74.99 €',
                'badge' => 'Accesorio Oficial',
                'image' => 'images/dualsense.jpg',
                'rating' => '9.6/10',
                'description' => 'Mando oficial Sony con retroalimentación háptica y gatillos adaptativos. Garantía de 3 años y prueba gratuita en nuestra tienda.',
                'publisher' => 'Sony Interactive Entertainment',
                'external_link' => 'https://www.playstation.com/es-es/accessories/dualsense-wireless-controller/',
            ],
        ];
    }

    /**
     * Vista 1: Página Principal (Inicio)
     */
    public function home(): View
    {
        $allProducts = $this->getCatalogData();
        $featuredGames = array_slice($allProducts, 0, 3);

        $categories = [
            ['name' => 'Juegos PS5 & Xbox', 'count' => 'Stock en Algeciras', 'icon' => 'gamepad'],
            ['name' => 'Nintendo Switch', 'count' => 'Exclusivos Nintendo', 'icon' => 'switch'],
            ['name' => 'Consolas & Hardware', 'count' => 'Garantía 3 Años', 'icon' => 'console'],
            ['name' => 'Accesorios & Mandos', 'count' => 'Periféricos Oficiales', 'icon' => 'headset'],
        ];

        $storeServices = [
            'Entrega en 24h en Algeciras, San Roque, Los Barrios, La Línea y todo el Campo de Gibraltar.',
            'Garantía europea oficial de 3 años en todas las consolas y mandos nuevos.',
            'Plan Renove: traes tus juegos usados a Calle Ancha y te damos saldo inmediato.',
            'Asesoramiento cercano en nuestra tienda física en Calle Regino Martínez 18, Algeciras.',
        ];

        return view('pages.home', compact('featuredGames', 'categories', 'storeServices'));
    }

    /**
     * Vista 2: Catálogo de Productos con filtrado por plataforma y búsqueda
     */
    public function catalog(Request $request): View
    {
        $allProducts = $this->getCatalogData();

        $selectedPlatform = $request->query('platform', 'Todas');
        $searchQuery = trim((string) $request->query('search', ''));

        $products = array_filter($allProducts, function ($product) use ($selectedPlatform, $searchQuery) {
            // Filtrado por plataforma
            if ($selectedPlatform !== 'Todas') {
                if (stripos($product['platform'], $selectedPlatform) === false) {
                    return false;
                }
            }

            // Filtrado por búsqueda en título, categoría o descripción
            if ($searchQuery !== '') {
                $matchesTitle = stripos($product['title'], $searchQuery) !== false;
                $matchesCategory = stripos($product['category'], $searchQuery) !== false;
                $matchesPlatform = stripos($product['platform'], $searchQuery) !== false;
                $matchesDescription = stripos($product['description'], $searchQuery) !== false;

                if (! $matchesTitle && ! $matchesCategory && ! $matchesPlatform && ! $matchesDescription) {
                    return false;
                }
            }

            return true;
        });

        $platforms = ['Todas', 'PlayStation 5', 'Xbox Series X', 'Nintendo Switch', 'PC Gaming'];

        $advantages = [
            'Productos 100% precintados con garantía oficial española.',
            'Reservas prioritarias sin cobro anticipado para clientes de la provincia de Cádiz.',
            'Servicio técnico local en Algeciras para limpieza y reparación de mandos y consolas.',
            'Descuento directo del 5% al presentar tu carnet de estudiante o socio Overdrive.',
        ];

        return view('pages.catalog', compact(
            'products',
            'platforms',
            'advantages',
            'selectedPlatform',
            'searchQuery'
        ));
    }

    /**
     * Vista 3: Sobre Nosotros y Contacto
     */
    public function about(): View
    {
        $storeInfo = [
            'name' => 'Overdrive Games',
            'foundation' => '2017',
            'location' => 'Calle Regino Martínez 18 (Calle Ancha), 11201 Algeciras, Cádiz, España',
            'phone' => '+34 956 65 43 21',
            'email' => 'info@overdrivegames.es',
            'hours' => 'Lunes a Sábado: 10:00 - 14:00 y 17:00 - 21:00 hs',
        ];

        $team = [
            ['name' => 'Alejandro Martínez', 'role' => 'Fundador & Especialista PlayStation / Xbox', 'experience' => 'Apasionado del gaming en Algeciras'],
            ['name' => 'Lucía Gallardo', 'role' => 'Responsable de Zona Nintendo & Coleccionismo', 'experience' => 'Experta en retro y merchandising'],
            ['name' => 'Manuel Benítez', 'role' => 'Técnico de Hardware & Servicio Posventa', 'experience' => 'Técnico de reparación de consolas'],
        ];

        $faqs = [
            '¿Dónde está la tienda física en Algeciras?' => 'Nos encontramos en la emblemática Calle Ancha (Calle Regino Martínez 18), en pleno centro peatonal de Algeciras.',
            '¿Hacéis envíos a otras zonas del Campo de Gibraltar?' => 'Sí, repartimos de forma express a Algeciras, Los Barrios, San Roque, La Línea, Tarifa y toda la provincia de Cádiz.',
            '¿Cómo funciona el Plan Renove en tienda?' => 'Traes tus juegos usados de PS4, PS5 o Switch a la tienda de Calle Ancha. Probamos los discos/cartuchos en el acto y te ofrecemos dinero en efectivo o saldo para comprar nuevos juegos.',
        ];

        return view('pages.about', compact('storeInfo', 'team', 'faqs'));
    }
}
