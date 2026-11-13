<?php
require __DIR__ . '/includes/bootstrap.php';

$page = [
    'path'        => '/',
    'title'       => 'MATMAZEL - İzmit Kadın Kuaförü & Premium Saç Makyaj Stüdyosu',
    'og_title'    => 'MATMAZEL - İzmit Kadın Kuaförü & Premium Saç Makyaj Stüdyosu',
    'description' => "MATMAZEL İzmit Hair & Make Up Studio: İzmit, Kocaeli'de kadınlara özel saç tasarımı, balyaj ve renklendirme, kesim, gelin saçı ve profesyonel makyaj. Randevu için WhatsApp veya Instagram.",
    'keywords'    => 'izmit kadın kuaförü, izmit kadın kuaför, matmazel izmit, izmit kuaför, kocaeli kuaför, kocaeli kadın kuaför, gelin saçı, profesyonel makyaj, izmit balyaj',
];

$homeGallery = [
    ['izmit-kuafor-kullu-kumral-balyaj-1', 'Küllü kumral balyaj ve dalgalı fön, Matmazel İzmit'],
    ['izmit-kuafor-sari-balyaj-dalgali-sac-1', 'Sarı balyaj ve uzun dalgalı saç, İzmit kadın kuaförü'],
    ['izmit-kuafor-platin-sari-katli-kesim-2', 'Platin sarı uzun katlı kesim, Matmazel İzmit'],
    ['izmit-kuafor-koyu-kahve-dalgali-sac', 'Koyu kahve dalgalı saç tasarımı, İzmit kuaför'],
];

require __DIR__ . '/includes/header.php';
?>
<div class="overflow-hidden">

  <!-- Hero -->
  <section class="min-h-screen flex items-center justify-center relative bg-gradient-to-br from-black via-[#0a0a0a] to-black">
    <div class="absolute inset-0 opacity-[0.03]" aria-hidden="true">
      <div class="absolute inset-0 dot-pattern"></div>
    </div>

    <div class="absolute inset-0 overflow-hidden" aria-hidden="true">
      <div class="glow glow--a absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-champagne/5 rounded-full blur-3xl"></div>
      <div class="glow glow--b absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-champagne/[0.03] rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-6 text-center z-10 relative">
      <div <?= reveal(0.2) ?> class="mb-8 flex justify-center">
        <?= logo('default', 'justify-center') ?>
      </div>

      <h1 <?= reveal(0.35) ?> class="font-body mb-4 font-light uppercase">
        <span class="block text-xs md:text-sm text-champagne tracking-[0.3em] mb-3">İzmit Kadın Kuaförü</span>
        <span lang="en" class="block text-xl md:text-2xl lg:text-3xl text-white/70 tracking-[0.2em]">Premium Hair &amp; Make Up Studio</span>
      </h1>

      <div <?= reveal(0.5) ?>><?= divider('w-24 h-px bg-champagne mx-auto mb-12') ?></div>

      <p <?= reveal(0.65) ?> class="text-base md:text-lg text-white/50 mb-12 max-w-2xl mx-auto leading-relaxed font-light">
        Hassasiyet ve sanatla hazırlanmış lüks güzellik hizmetleri deneyimi
      </p>

      <div <?= reveal(0.8) ?> class="w-full flex justify-center">
        <div class="flex flex-col gap-3 w-full max-w-xl justify-center items-center">
          <?= cta_button(INSTAGRAM_URL, "Instagram'dan Randevu Al", ['external' => true, 'class' => 'px-6 py-3 space-x-2 w-full']) ?>
          <?= cta_button(WHATSAPP_URL, "WhatsApp'tan İletişime Geç", ['external' => true, 'class' => 'px-6 py-3 space-x-2 w-full']) ?>
        </div>
      </div>
    </div>

    <div class="scroll-hint absolute bottom-12 left-1/2 transform -translate-x-1/2" aria-hidden="true">
      <div class="w-px h-12 bg-gradient-to-b from-champagne/50 to-transparent"></div>
    </div>
  </section>

  <!-- Stüdyo Hakkında -->
  <section class="py-32 bg-black relative">
    <div class="absolute inset-0 border-t border-b border-white/5" aria-hidden="true"></div>
    <div class="container mx-auto px-6 relative">
      <div class="max-w-4xl mx-auto">
        <div <?= reveal() ?> class="text-center mb-16">
          <h2 class="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light">Stüdyo Hakkında</h2>
          <?= divider('w-24 h-px bg-champagne mx-auto mb-8') ?>
        </div>

        <div <?= reveal(0.15) ?> class="grid md:grid-cols-2 gap-16 items-center">
          <div>
            <p class="text-white/70 text-lg leading-relaxed mb-6 font-light">
              MATMAZEL, İzmit'te kadınlara özel premium saç ve makyaj hizmetleri sunan
              bir lüks stüdyodur. Uzman ekibimiz, sanatçılık ile hassasiyeti birleştirerek
              benzersiz stilinizi ve kişiliğinizi yansıtan çarpıcı dönüşümler yaratır.
            </p>
            <p class="text-white/60 text-base leading-relaxed mb-8 font-light">
              Güzelliğin bir sanat formu olduğuna inanıyoruz ve her müşterinin
              kendine güvenli, şık ve ışıltılı hissetmeyi hak ettiğini düşünüyoruz.
            </p>
            <?= text_link('/hakkimizda', 'Daha Fazla Bilgi') ?>
          </div>
          <div class="relative">
            <div class="aspect-square bg-white/5 border border-white/10 p-8">
              <div class="w-full h-full bg-gradient-to-br from-champagne/10 to-transparent">
                <?= img('matmazel-izmit-salon-ic-mekan', "MATMAZEL İzmit kadın kuaförü salon iç mekânı, Karabaş Mahallesi", [
                    'class' => 'w-full h-full object-cover',
                    'sizes' => '(min-width: 768px) 380px, 90vw',
                ]) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Hizmetler -->
  <section class="py-32 bg-gradient-to-b from-black to-[#0a0a0a]">
    <div class="container mx-auto px-6">
      <div <?= reveal() ?> class="text-center mb-20">
        <h2 class="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light">Hizmetlerimiz</h2>
        <?= divider() ?>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8 max-w-7xl mx-auto">
<?php foreach (SERVICES as $i => $s): ?>
        <a href="/hizmetler#<?= e($s['id']) ?>" class="group text-center block" <?= reveal($i * 0.1) ?>>
          <div class="mb-6 h-20 flex items-center justify-center">
            <div class="w-16 h-16 border border-champagne/30 group-hover:border-champagne transition-colors duration-500 flex items-center justify-center relative">
              <span class="text-champagne"><?= icon($s['icon'], 'w-7 h-7') ?></span>
              <span class="absolute inset-0 border border-champagne/10 group-hover:border-champagne/30 transition-colors duration-500 scale-75" aria-hidden="true"></span>
            </div>
          </div>
          <h3 class="font-heading text-lg mb-3 tracking-wide font-light"><?= e($s['title']) ?></h3>
          <p class="text-white/50 text-sm leading-relaxed font-light"><?= e($s['short']) ?></p>
        </a>
<?php endforeach; ?>
      </div>

      <div <?= reveal() ?> class="text-center mt-16">
        <?= text_link('/hizmetler', 'Tüm Hizmetleri Gör') ?>
      </div>
    </div>
  </section>

  <!-- Galeri önizleme -->
  <section class="py-32 bg-black relative">
    <div class="absolute inset-0 border-t border-b border-white/5" aria-hidden="true"></div>
    <div class="container mx-auto px-6 relative">
      <div <?= reveal() ?> class="text-center mb-16">
        <h2 class="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light">Galeri</h2>
        <?= divider('w-24 h-px bg-champagne mx-auto mb-8') ?>
        <p class="text-white/60 text-lg max-w-2xl mx-auto font-light">Çarpıcı dönüşümler portföyümüzü keşfedin</p>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-6xl mx-auto">
<?php foreach ($homeGallery as $i => [$name, $alt]): ?>
        <a href="/galeri" <?= reveal($i * 0.1) ?>
           class="hover-lift block aspect-square overflow-hidden border border-white/10 hover:border-champagne/50 transition-colors duration-500 group relative">
          <?= img($name, $alt, [
              'class' => 'w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700',
              'sizes' => '(min-width: 768px) 25vw, 50vw',
          ]) ?>
          <span class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors duration-500" aria-hidden="true"></span>
        </a>
<?php endforeach; ?>
      </div>

      <div <?= reveal() ?> class="text-center mt-12">
        <?= text_link('/galeri', 'Tam Galeriyi Gör') ?>
      </div>
    </div>
  </section>

  <!-- Müşteri yorumları -->
  <section class="py-32 bg-gradient-to-b from-[#0a0a0a] to-black">
    <div class="container mx-auto px-6">
      <div <?= reveal() ?> class="text-center mb-20">
        <h2 class="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light">Müşteri Yorumları</h2>
        <?= divider() ?>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
<?php foreach (TESTIMONIALS as $i => $t): ?>
        <figure <?= reveal($i * 0.2) ?> class="border border-white/10 p-8 hover:border-champagne/30 transition-colors duration-500 relative group">
          <span class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-champagne/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500" aria-hidden="true"></span>
          <div class="mb-4 flex space-x-1 text-champagne" role="img" aria-label="<?= (int)$t['rating'] ?> üzerinden 5 yıldız">
            <?= str_repeat(icon('star', 'w-4 h-4'), (int)$t['rating']) ?>
          </div>
          <blockquote class="text-white/70 mb-6 leading-relaxed italic font-light">
            <p>"<?= e($t['text']) ?>"</p>
          </blockquote>
          <figcaption class="text-champagne text-sm tracking-wide font-light">— <?= e($t['author']) ?></figcaption>
        </figure>
<?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- İletişim CTA -->
  <section class="py-32 bg-black relative">
    <div class="absolute inset-0 border-t border-white/5" aria-hidden="true"></div>
    <div class="container mx-auto px-6 text-center relative">
      <div <?= reveal() ?>>
        <h2 class="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light">Bizi Ziyaret Edin</h2>
        <?= divider('w-24 h-px bg-champagne mx-auto mb-8') ?>
        <p class="text-white/60 text-lg mb-4 max-w-2xl mx-auto font-light leading-relaxed">
          İzmit'in kalbinde yer alan stüdyomuzda lüks güzellik hizmetlerini deneyimlemeye davetlisiniz.
        </p>
        <p class="text-champagne/80 text-sm md:text-base mb-12 max-w-2xl mx-auto font-light tracking-wide">
          <?= e(ADDRESS_FULL) ?>
        </p>
        <?= cta_button('/iletisim', 'İletişime Geç') ?>
      </div>
    </div>
  </section>

</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
