<?php
require __DIR__ . '/includes/bootstrap.php';

http_response_code(404);

$page = [
    'path'        => current_path(),
    'title'       => 'Sayfa Bulunamadı | MATMAZEL İzmit',
    'description' => 'Aradığınız sayfa bulunamadı. MATMAZEL İzmit kadın kuaförü ana sayfasına dönebilirsiniz.',
    'robots'      => 'noindex, follow',
];

require __DIR__ . '/includes/header.php';
?>
<section class="min-h-[70vh] flex items-center justify-center py-32">
  <div class="container mx-auto px-6 text-center">
    <p class="font-heading text-champagne text-6xl md:text-8xl font-light tracking-wider mb-6">404</p>
    <h1 class="font-heading text-2xl md:text-4xl mb-8 tracking-wider font-light">Sayfa Bulunamadı</h1>
    <?= divider('w-24 h-px bg-champagne mx-auto mb-8') ?>
    <p class="text-white/60 text-lg mb-12 max-w-xl mx-auto font-light leading-relaxed">
      Aradığınız sayfa taşınmış ya da kaldırılmış olabilir.
    </p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
      <?= cta_button('/', 'Ana Sayfaya Dön') ?>
      <?= cta_button('/hizmetler', 'Hizmetlerimiz') ?>
    </div>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
