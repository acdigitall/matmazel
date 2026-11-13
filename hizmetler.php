<?php
require __DIR__ . '/includes/bootstrap.php';

$page = [
    'path'        => '/hizmetler',
    'title'       => 'Hizmetler: Saç Tasarımı, Balyaj, Gelin Saçı, Makyaj | MATMAZEL İzmit',
    'description' => "İzmit'te saç tasarımı, renklendirme (balyaj, ombre, highlight), kesim, gelin saçı ve profesyonel makyaj. MATMAZEL İzmit kadın kuaförü hizmetlerini keşfedin.",
    'breadcrumb'  => 'Hizmetler',
];

// Hizmet listesi için ItemList şeması
$page['schema_extra'] = [[
    '@type' => 'ItemList',
    '@id'   => abs_url('/hizmetler') . '#hizmet-listesi',
    'name'  => 'MATMAZEL İzmit Hizmetleri',
    'itemListElement' => array_map(fn($s, $i) => [
        '@type'    => 'ListItem',
        'position' => $i + 1,
        'item'     => [
            '@type'       => 'Service',
            'name'        => $s['title'],
            'description' => $s['description'],
            'url'         => abs_url('/hizmetler') . '#' . $s['id'],
            'image'       => abs_url('/assets/img/' . $s['image'] . '-1200.webp'),
            'provider'    => ['@id' => SITE_URL . '/#salon'],
            'areaServed'  => ['@type' => 'City', 'name' => 'İzmit'],
        ],
    ], SERVICES, array_keys(SERVICES)),
]];

require __DIR__ . '/includes/header.php';
?>
<div class="py-32">

  <section class="container mx-auto px-6 mb-32">
    <div class="max-w-5xl mx-auto text-center">
      <h1 <?= reveal(0.1) ?> class="font-heading text-3xl md:text-5xl mb-8 tracking-wider font-light">Hizmetlerimiz</h1>
      <div <?= reveal(0.25) ?>><?= divider('w-32 h-px bg-champagne mx-auto mb-12') ?></div>
      <p <?= reveal(0.4) ?> class="text-white/60 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto font-light">
        Doğal güzelliğinizi geliştirmek için tasarlanmış kapsamlı premium güzellik hizmetleri yelpazemizi keşfedin
      </p>
    </div>
  </section>

  <section class="container mx-auto px-6">
    <div class="max-w-7xl mx-auto space-y-32">
<?php foreach (SERVICES as $i => $s): ?>
      <article id="<?= e($s['id']) ?>" class="scroll-mt-28 flex flex-col <?= $i % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' ?> items-center gap-16">
        <div <?= reveal() ?> class="flex-1 w-full md:w-auto">
          <div class="aspect-square relative overflow-hidden rounded-xl bg-gradient-to-br from-champagne/10 to-transparent border border-white/10 group transition-all duration-500 hover:border-champagne/30">
            <?= img($s['image'], $s['alt'], [
                'class'   => 'w-full h-full object-cover scale-100 group-hover:scale-105 transition-transform duration-700',
                'sizes'   => '(min-width: 768px) 45vw, 100vw',
                'loading' => $i === 0 ? 'eager' : 'lazy',
            ]) ?>
            <span class="absolute inset-0 border border-champagne/10 rounded-xl group-hover:border-champagne/30 transition-colors duration-500" aria-hidden="true"></span>
          </div>
        </div>

        <div <?= reveal(0.15) ?> class="flex-1">
          <h2 class="font-heading text-3xl md:text-5xl mb-6 tracking-wider font-light"><?= e($s['title']) ?></h2>
          <?= divider('w-24 h-px bg-champagne mb-8') ?>
          <p class="text-white/70 text-lg md:text-xl leading-relaxed mb-8 font-light"><?= e($s['description']) ?></p>
          <ul class="space-y-4">
<?php foreach ($s['features'] as $f): ?>
            <li class="flex items-start text-white/60 group">
              <span class="w-1.5 h-1.5 bg-champagne mr-4 mt-2 group-hover:scale-150 transition-transform duration-300 flex-shrink-0" aria-hidden="true"></span>
              <span class="font-light"><?= e($f) ?></span>
            </li>
<?php endforeach; ?>
          </ul>
        </div>
      </article>
<?php endforeach; ?>
    </div>
  </section>

  <section class="mt-32 py-32 bg-gradient-to-b from-black to-[#0a0a0a] relative">
    <div class="absolute inset-0 border-t border-b border-white/5" aria-hidden="true"></div>
    <div class="container mx-auto px-6 text-center relative">
      <div <?= reveal() ?>>
        <h2 class="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light">Dönüşüme Hazır mısınız?</h2>
        <?= divider('w-24 h-px bg-champagne mx-auto mb-8') ?>
        <p class="text-white/60 text-lg md:text-xl mb-12 max-w-2xl mx-auto font-light leading-relaxed">
          Bugün randevunuzu alın ve MATMAZEL farkını deneyimleyin
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
          <?= cta_button(INSTAGRAM_URL, 'Instagram Üzerinden Randevu Al', ['external' => true]) ?>
          <?= cta_button(WHATSAPP_URL, 'WhatsApp ile Randevu Al', ['external' => true]) ?>
        </div>
      </div>
    </div>
  </section>

</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
