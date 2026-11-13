<?php
require __DIR__ . '/includes/bootstrap.php';

$page = [
    'path'        => '/iletisim',
    'title'       => 'İletişim ve Adres | MATMAZEL İzmit Kadın Kuaförü Randevu',
    'description' => 'MATMAZEL İzmit adres: ' . ADDRESS_FULL . '. Randevu için WhatsApp ' . PHONE_DISPLAY . ' veya Instagram ' . INSTAGRAM_HANDLE . '. Yol tarifi ve harita.',
    'breadcrumb'  => 'İletişim',
    'schema_type' => 'ContactPage',
    'hide_footer_map' => true,
];

require __DIR__ . '/includes/header.php';
?>
<div class="py-32">

  <section class="container mx-auto px-6 mb-20">
    <div class="max-w-5xl mx-auto text-center">
      <h1 <?= reveal(0.1) ?> class="font-heading text-3xl md:text-5xl mb-8 tracking-wider font-light">İletişim</h1>
      <div <?= reveal(0.25) ?>><?= divider('w-32 h-px bg-champagne mx-auto mb-12') ?></div>
      <p <?= reveal(0.4) ?> class="text-white/60 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto font-light">
        Randevu almak veya hizmetlerimiz hakkında bilgi almak için bizimle iletişime geçin
      </p>
    </div>
  </section>

  <div class="container mx-auto px-6">
    <div class="max-w-7xl mx-auto">
      <h2 <?= reveal() ?> class="font-heading text-3xl md:text-5xl mb-12 tracking-wider font-light">Stüdyomuzu Ziyaret Edin</h2>

      <div class="space-y-8 mb-12">
        <div <?= reveal(0.15) ?>>
          <h3 class="text-champagne text-sm tracking-wider mb-3 font-light uppercase">Adres</h3>
          <address class="not-italic text-white/70 leading-relaxed font-light">
            <?= e(ADDRESS_STREET) ?><br>
            İzmit/KOCAELİ
          </address>
          <a href="<?= e(MAPS_URL) ?>" target="_blank" rel="noopener"
             class="inline-flex items-center space-x-2 text-champagne text-xs hover:underline mt-2 font-light">
            <span>Haritada Aç / Yol Tarifi Al</span>
            <?= icon('external', 'w-3.5 h-3.5') ?>
          </a>
        </div>

        <div <?= reveal(0.3) ?>>
          <h3 class="text-champagne text-sm tracking-wider mb-4 font-light uppercase">İletişim</h3>
          <div class="space-y-4">
            <a href="<?= e(INSTAGRAM_URL) ?>" target="_blank" rel="noopener"
               class="flex items-center space-x-4 text-white/70 hover:text-champagne transition-colors duration-300 group">
              <span class="w-12 h-12 border border-white/10 group-hover:border-champagne/50 transition-colors duration-300 flex items-center justify-center"><?= icon('instagram') ?></span>
              <span class="font-light"><?= e(INSTAGRAM_HANDLE) ?></span>
            </a>

            <a href="<?= e(WHATSAPP_URL) ?>" target="_blank" rel="noopener"
               class="flex items-center space-x-4 text-white/70 hover:text-champagne transition-colors duration-300 group">
              <span class="w-12 h-12 border border-white/10 group-hover:border-champagne/50 transition-colors duration-300 flex items-center justify-center"><?= icon('whatsapp') ?></span>
              <span class="font-light">WhatsApp</span>
            </a>

            <a href="tel:<?= e(PHONE_E164) ?>"
               class="flex items-center space-x-4 text-white/70 hover:text-champagne transition-colors duration-300 group">
              <span class="w-12 h-12 border border-white/10 group-hover:border-champagne/50 transition-colors duration-300 flex items-center justify-center"><?= icon('phone') ?></span>
              <span class="font-light"><?= e(PHONE_DISPLAY) ?></span>
            </a>
          </div>
        </div>
      </div>

      <div <?= reveal(0.2) ?> class="w-full h-80 border border-white/10 overflow-hidden">
        <iframe
          src="<?= e(MAPS_EMBED) ?>"
          width="100%" height="100%" style="border:0" allowfullscreen loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="opacity-80 hover:opacity-100 transition-opacity duration-300"
          title="MATMAZEL İzmit kuaför konumu - Google Haritalar"></iframe>
      </div>
    </div>
  </div>

</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
