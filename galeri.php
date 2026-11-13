<?php
require __DIR__ . '/includes/bootstrap.php';

$page = [
    'path'        => '/galeri',
    'title'       => 'Galeri: Balyaj, Saç Kesimi ve Gelin Saçı Örnekleri | MATMAZEL İzmit',
    'description' => "MATMAZEL İzmit'in balyaj, ombre, platin sarı, katlı kesim ve dalgalı fön çalışmaları. İzmit kadın kuaförü portföyümüzden gerçek müşteri dönüşümleri.",
    'breadcrumb'  => 'Galeri',
    'schema_type' => 'CollectionPage',
];

$page['schema_extra'] = [[
    '@type' => 'ImageGallery',
    '@id'   => abs_url('/galeri') . '#galeri',
    'name'  => 'MATMAZEL İzmit Saç ve Makyaj Galerisi',
    'associatedMedia' => array_map(fn($g) => [
        '@type'      => 'ImageObject',
        'contentUrl' => abs_url('/assets/img/' . $g[0] . '-1200.webp'),
        'caption'    => $g[1],
    ], GALLERY),
]];

$rowSpan = ['tall' => 'g-tall', 'wide' => 'g-wide', 'square' => 'g-square'];

require __DIR__ . '/includes/header.php';
?>
<div class="py-32">

  <section class="container mx-auto px-6 mb-20">
    <div class="max-w-5xl mx-auto text-center">
      <h1 <?= reveal(0.1) ?> class="font-heading text-3xl md:text-5xl mb-8 tracking-wider font-light">Galeri</h1>
      <div <?= reveal(0.2) ?>><?= divider('w-32 h-px bg-champagne mx-auto mb-12') ?></div>
      <p <?= reveal(0.3) ?> class="text-white/60 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto font-light">
        Çarpıcı dönüşümler ve güzel yaratımlar portföyümüzü keşfedin
      </p>
    </div>
  </section>

  <section class="container mx-auto px-6" aria-label="Fotoğraf galerisi">
    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-[10px]">
<?php foreach (GALLERY as $i => [$name, $alt, $aspect]): ?>
      <li <?= reveal(($i % 3) * 0.1) ?>
          class="hover-lift overflow-hidden rounded-xl bg-white/5 border border-white/10 hover:border-champagne/50 transition-all duration-500 group <?= $rowSpan[$aspect] ?>">
        <a href="/assets/img/<?= e($name) ?>-1200.webp" class="relative block w-full h-full" data-lightbox aria-label="Büyüt: <?= e($alt) ?>">
          <?= img($name, $alt, [
              'class'   => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-700',
              'loading' => $i < 3 ? 'eager' : 'lazy',
          ]) ?>
        </a>
      </li>
<?php endforeach; ?>
    </ul>
  </section>

  <section class="mt-32 py-32 bg-gradient-to-b from-black to-[#0a0a0a] relative">
    <div class="absolute inset-0 border-t border-b border-white/5" aria-hidden="true"></div>
    <div class="container mx-auto px-6 text-center relative">
      <div <?= reveal() ?>>
        <h2 class="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light">Çalışmalarımızı Takip Edin</h2>
        <?= divider('w-24 h-px bg-champagne mx-auto mb-8') ?>
        <p class="text-white/60 text-lg md:text-xl mb-12 max-w-2xl mx-auto font-light leading-relaxed">
          Instagram'da en son yaratımlarımızı ve dönüşümlerimizi görün
        </p>
        <?= cta_button(INSTAGRAM_URL, "Instagram'ımızı Ziyaret Et", ['external' => true]) ?>
      </div>
    </div>
  </section>

  <!-- Lightbox -->
  <div class="lightbox fixed inset-0 bg-black/95 backdrop-blur-md z-50 flex items-center justify-center p-6"
       role="dialog" aria-modal="true" aria-label="Büyütülmüş fotoğraf" hidden data-lightbox-modal>
    <div class="lightbox-inner max-w-6xl max-h-full relative">
      <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt=""
           class="max-w-full max-h-[90vh] object-contain border border-white/20" data-lightbox-img>
      <button type="button" class="absolute top-6 right-6 text-white/80 hover:text-white text-4xl font-light transition-colors leading-none"
              aria-label="Kapat" data-lightbox-close>&times;</button>
    </div>
  </div>

</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
