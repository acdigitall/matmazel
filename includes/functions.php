<?php
/**
 * Yardımcı fonksiyonlar: kaçış, varlık yolları, duyarlı görseller, ikonlar, şema.
 */

if (!defined('MATMAZEL')) {
    http_response_code(403);
    exit;
}

/** HTML kaçışı */
function e(?string $s): string
{
    return htmlspecialchars((string)$s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Mutlak URL (canonical, og:url, sitemap için) */
function abs_url(string $path = '/'): string
{
    return SITE_URL . ($path === '/' ? '/' : '/' . ltrim($path, '/'));
}

/** Önbellek kırıcı sürüm parametreli statik dosya yolu */
function asset(string $path): string
{
    $file = ROOT_DIR . '/' . ltrim($path, '/');
    $v = is_file($file) ? filemtime($file) : 0;
    return '/' . ltrim($path, '/') . ($v ? '?v=' . $v : '');
}

/** İstek yolunu normalize eder: "/hakkimizda" */
function current_path(): string
{
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $path = '/' . trim(rawurldecode($path), '/');
    return $path === '/index.php' ? '/' : preg_replace('/\.php$/', '', $path);
}

/** Görsel boyutları (önbellekli) */
function img_size(string $file): array
{
    static $cache = [];
    if (!isset($cache[$file])) {
        $info = @getimagesize(ROOT_DIR . '/assets/img/' . $file);
        $cache[$file] = $info ? [$info[0], $info[1]] : [0, 0];
    }
    return $cache[$file];
}

/**
 * Duyarlı <img>: assets/img/{name}-600.webp ve -1200.webp dosyalarını srcset ile verir.
 *
 * @param string $name  Uzantısız ve boyutsuz dosya adı
 * @param string $alt   Açıklayıcı alternatif metin
 * @param array  $opt   class, sizes, loading (lazy|eager), fetchpriority, attrs (ek nitelikler)
 */
function img(string $name, string $alt, array $opt = []): string
{
    $small = "$name-600.webp";
    $large = "$name-1200.webp";
    [$w1, $h1] = img_size($small);
    [$w2]      = img_size($large);

    $srcset = '/assets/img/' . $small . ' ' . $w1 . 'w';
    if ($w2 > $w1) {
        $srcset .= ', /assets/img/' . $large . ' ' . $w2 . 'w';
    }

    $attrs = [
        'src'      => '/assets/img/' . $small,
        'srcset'   => $srcset,
        'sizes'    => $opt['sizes'] ?? '(min-width: 1024px) 33vw, (min-width: 640px) 50vw, 100vw',
        'width'    => $w1,
        'height'   => $h1,
        'alt'      => $alt,
        'loading'  => $opt['loading'] ?? 'lazy',
        'decoding' => 'async',
        'class'    => $opt['class'] ?? null,
        'fetchpriority' => $opt['fetchpriority'] ?? null,
    ] + ($opt['attrs'] ?? []);

    $html = '<img';
    foreach ($attrs as $k => $v) {
        if ($v !== null && $v !== '') {
            $html .= ' ' . $k . '="' . e((string)$v) . '"';
        }
    }
    return $html . '>';
}

/** Logo (React'teki Logo bileşeninin karşılığı) */
function logo(string $variant = 'minimal', string $class = ''): string
{
    $alt = 'MATMAZEL İzmit kadın kuaförü logosu';
    $img = '<picture><source srcset="' . e(asset('assets/img/matmazel-logo-beyaz.webp')) . '" type="image/webp">'
         . '<img src="' . e(asset('assets/img/matmazel-logo-beyaz.png')) . '" width="160" height="124" alt="' . e($alt) . '" class="w-full h-full object-contain"></picture>';

    if ($variant === 'default') {
        return '<span class="logo-anim flex items-center space-x-3 ' . e($class) . '">'
            . '<span class="relative block w-12 h-12 md:w-16 md:h-16">' . $img . '</span>'
            . '<span class="font-heading text-xl md:text-2xl font-light tracking-wider text-white">MATMAZEL</span>'
            . '<span aria-hidden="true"> |</span>'
            . '<span class="font-heading text-sm font-light tracking-wider text-white">İZMİT</span>'
            . '</span>';
    }

    return '<span class="logo-anim flex items-center space-x-2 ' . e($class) . '">'
        . '<span class="relative block w-10 h-10 md:w-12 md:h-12">' . $img . '</span>'
        . '<span class="font-heading text-lg md:text-xl font-light tracking-wider text-white">MATMAZEL</span>'
        . '<span aria-hidden="true"> |</span>'
        . '<span class="font-heading text-sm md:text-sm font-light tracking-wider text-white">İZMİT</span>'
        . '</span>';
}

/** Satır içi SVG ikonlar */
function icon(string $name, string $class = 'w-5 h-5'): string
{
    $stroke = fn(string $d, string $sw = '1.5') =>
        '<svg class="' . $class . '" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">' .
        implode('', array_map(fn($p) => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="' . $sw . '" d="' . $p . '"/>', (array)$d)) .
        '</svg>';
    $fill = fn(string $d, string $vb = '0 0 24 24') =>
        '<svg class="' . $class . '" fill="currentColor" viewBox="' . $vb . '" aria-hidden="true"><path d="' . $d . '"/></svg>';

    // Hizmet / değer ikonları: ince çizgili, şampanya rengi (currentColor)
    $line = fn(array $paths, array $circles = []) =>
        '<svg class="' . $class . '" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true">'
        . implode('', array_map(fn($p) => '<path d="' . $p . '"/>', $paths))
        . implode('', array_map(fn($c) => '<circle cx="' . $c[0] . '" cy="' . $c[1] . '" r="' . $c[2] . '"/>', $circles))
        . '</svg>';

    switch ($name) {
        case 'svc-dryer': // Saç tasarımı: fön makinesi
            return $line([
                'M9 3.5h7.5v10H9a5 5 0 0 1 0-10z',
                'M16.5 6H21v5h-4.5',
                'M8.5 13.5l1.3 6.6a1 1 0 0 0 1 .9h1.4a1 1 0 0 0 1-1.1l-.7-6.4',
            ], [[9, 8.5, 2]]);
        case 'svc-palette': // Renklendirme: renk paleti
            return $line([
                'M12 22a1 1 0 0 1 0-20 10 9 0 0 1 10 9 5 5 0 0 1-5 5h-2.25a1.75 1.75 0 0 0-1.4 2.8l.3.4a1.75 1.75 0 0 1-1.4 2.8z',
            ], [[13.5, 6.5, 1], [17.5, 10.5, 1], [6.5, 12.5, 1], [8.5, 7.5, 1]]);
        case 'svc-scissors': // Kesim: makas
            return $line([
                'M20 4 8.12 15.88',
                'M14.47 14.48 20 20',
                'M8.12 8.12 12 12',
            ], [[6, 6, 3], [6, 18, 3]]);
        case 'svc-crown': // Gelin saçı: gelin tacı
            return $line([
                'M11.56 3.27a.5.5 0 0 1 .88 0l2.95 5.6a1 1 0 0 0 1.52.3l4.27-3.67a.5.5 0 0 1 .8.52l-2.83 10.24a1 1 0 0 1-.96.74H5.81a1 1 0 0 1-.96-.74L2.02 6.02a.5.5 0 0 1 .8-.52l4.27 3.67a1 1 0 0 0 1.52-.3z',
                'M5 21h14',
            ]);
        case 'svc-lipstick': // Profesyonel makyaj: ruj
            return $line([
                'M9.5 9.5V4.6a1 1 0 0 1 .6-.92l3.8-1.6a.4.4 0 0 1 .6.37V9.5',
                'M8 9.5h8v4H8z',
                'M6.5 13.5h11v8h-11z',
            ]);
        case 'val-sparkles': // Mükemmellik
            return $line([
                'M9.94 15.5A2 2 0 0 0 8.5 14.06l-6.14-1.58a.5.5 0 0 1 0-.96L8.5 9.94A2 2 0 0 0 9.94 8.5l1.58-6.14a.5.5 0 0 1 .96 0l1.58 6.14a2 2 0 0 0 1.44 1.44l6.14 1.58a.5.5 0 0 1 0 .96l-6.14 1.58a2 2 0 0 0-1.44 1.44l-1.58 6.14a.5.5 0 0 1-.96 0z',
                'M20 3v4', 'M22 5h-4', 'M4 17v2', 'M5 18H3',
            ]);
        case 'val-gem': // Lüks
            return $line([
                'M6 3h12l4 6-10 13L2 9z',
                'M11 3 8 9l4 13 4-13-3-6',
                'M2 9h20',
            ]);
        case 'val-star': // Yenilik
            return $line([
                'M11.53 2.3a.53.53 0 0 1 .94 0l2.31 4.68a2.12 2.12 0 0 0 1.6 1.16l5.16.76a.53.53 0 0 1 .3.9l-3.74 3.64a2.12 2.12 0 0 0-.61 1.88l.88 5.14a.53.53 0 0 1-.77.56l-4.62-2.43a2.12 2.12 0 0 0-1.97 0l-4.62 2.43a.53.53 0 0 1-.77-.56l.88-5.14a2.12 2.12 0 0 0-.61-1.88L2.16 9.8a.53.53 0 0 1 .3-.9l5.16-.76a2.12 2.12 0 0 0 1.6-1.16z',
            ]);
        case 'pin':
            return '<svg class="' . $class . '" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">'
                . '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>'
                . '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>';
        case 'arrow':
            return $stroke('M9 5l7 7-7 7');
        case 'external':
            return $stroke('M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14');
        case 'phone':
            return $stroke('M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z');
        case 'close':
            return $stroke('M6 18L18 6M6 6l12 12', '2');
        case 'close-thin':
            return $stroke('M6 18L18 6M6 6l12 12');
        case 'menu':
            return $stroke('M4 6h16M4 12h16M4 18h16');
        case 'star':
            return $fill('M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z', '0 0 20 20');
        case 'instagram':
            return $fill('M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z');
        case 'whatsapp':
            return $fill('M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z');
    }
    return '';
}

/** Kenar dolgulu, şampanya rengi ana CTA butonu (orijinal tasarımdaki dolum efekti ile) */
function cta_button(string $href, string $label, array $opt = []): string
{
    $external = $opt['external'] ?? false;
    $extra = $opt['class'] ?? 'px-10 py-4 space-x-3';
    return '<a href="' . e($href) . '"' . ($external ? ' target="_blank" rel="noopener"' : '')
        . ' class="btn-fill group inline-flex items-center justify-center ' . e($extra) . ' border border-champagne/50 text-champagne hover:text-black transition-all duration-500 tracking-wider text-sm font-light relative overflow-hidden">'
        . '<span class="relative z-10 whitespace-nowrap">' . e($label) . '</span>'
        . '<span class="relative z-10 transform group-hover:translate-x-1 transition-transform">' . icon('arrow', 'w-4 h-4') . '</span>'
        . '<span class="absolute inset-0 bg-champagne transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left" aria-hidden="true"></span>'
        . '</a>';
}

/** Metin bağlantısı + ok ("Daha Fazla Bilgi" vb.) */
function text_link(string $href, string $label): string
{
    return '<a href="' . e($href) . '" class="inline-flex items-center space-x-2 text-champagne hover:text-white transition-colors duration-300 tracking-wider text-sm font-light group">'
        . '<span>' . e($label) . '</span>'
        . '<span class="transform group-hover:translate-x-1 transition-transform">' . icon('arrow', 'w-4 h-4') . '</span>'
        . '</a>';
}

/** Görünür olunca aşağıdan yukarı belirme animasyonu nitelikleri */
function reveal(float $delay = 0): string
{
    return 'data-reveal' . ($delay > 0 ? ' style="--reveal-delay:' . rtrim(rtrim(number_format($delay, 2, '.', ''), '0'), '.') . 's"' : '');
}

/** Bölüm başlığı altındaki ince şampanya çizgisi */
function divider(string $class = 'w-24 h-px bg-champagne mx-auto'): string
{
    return '<div class="' . e($class) . '" aria-hidden="true"></div>';
}

/* ---------------------------------------------------------------------------
 * Yapılandırılmış veri (Schema.org JSON-LD)
 * ------------------------------------------------------------------------- */

function schema_salon(): array
{
    $offers = array_map(fn($s) => [
        '@type' => 'Offer',
        'itemOffered' => [
            '@type' => 'Service',
            'name' => $s['title'],
            'description' => $s['description'],
            'url' => abs_url('/hizmetler') . '#' . $s['id'],
        ],
    ], SERVICES);

    return [
        '@type' => ['HairSalon', 'BeautySalon'],
        '@id' => SITE_URL . '/#salon',
        'name' => SITE_NAME,
        'alternateName' => ['MATMAZEL İzmit', 'Matmazel Kuaför İzmit'],
        'description' => "İzmit, Kocaeli'de kadınlara özel premium saç tasarımı, renklendirme, kesim, gelin saçı ve profesyonel makyaj stüdyosu.",
        'url' => SITE_URL . '/',
        'logo' => abs_url('/assets/img/matmazel-logo.jpg'),
        'image' => [abs_url(OG_IMAGE), abs_url('/assets/img/matmazel-izmit-salon-ic-mekan-1200.webp')],
        'telephone' => PHONE_E164,
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => ADDRESS_STREET,
            'addressLocality' => ADDRESS_LOCALITY,
            'addressRegion' => ADDRESS_REGION,
            'addressCountry' => 'TR',
        ],
        'hasMap' => MAPS_URL,
        'areaServed' => [
            ['@type' => 'City', 'name' => 'İzmit'],
            ['@type' => 'AdministrativeArea', 'name' => 'Kocaeli'],
        ],
        'sameAs' => [INSTAGRAM_URL],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Saç ve Makyaj Hizmetleri',
            'itemListElement' => $offers,
        ],
    ];
}

function schema_website(): array
{
    return [
        '@type' => 'WebSite',
        '@id' => SITE_URL . '/#website',
        'url' => SITE_URL . '/',
        'name' => SITE_NAME,
        'inLanguage' => 'tr-TR',
        'publisher' => ['@id' => SITE_URL . '/#salon'],
    ];
}

/** @param array $page title, description, path, breadcrumb (etiket) */
function schema_webpage(array $page): array
{
    $url = abs_url($page['path']);
    $node = [
        '@type' => $page['schema_type'] ?? 'WebPage',
        '@id' => $url . '#webpage',
        'url' => $url,
        'name' => $page['title'],
        'description' => $page['description'],
        'inLanguage' => 'tr-TR',
        'isPartOf' => ['@id' => SITE_URL . '/#website'],
        'about' => ['@id' => SITE_URL . '/#salon'],
        'primaryImageOfPage' => ['@type' => 'ImageObject', 'url' => abs_url($page['og_image'] ?? OG_IMAGE)],
    ];
    if (!empty($page['breadcrumb'])) {
        $node['breadcrumb'] = [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Ana Sayfa', 'item' => SITE_URL . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => $page['breadcrumb'], 'item' => $url],
            ],
        ];
    }
    return $node;
}

function render_schema(array $page): string
{
    $graph = [schema_salon(), schema_website(), schema_webpage($page)];
    foreach ($page['schema_extra'] ?? [] as $node) {
        $graph[] = $node;
    }
    $json = json_encode(
        ['@context' => 'https://schema.org', '@graph' => $graph],
        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
    );
    return '<script type="application/ld+json">' . "\n" . $json . "\n" . '</script>';
}
