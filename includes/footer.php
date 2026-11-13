<?php
if (!defined('MATMAZEL')) {
    http_response_code(403);
    exit;
}
?>
    </main>

    <footer class="bg-black border-t border-white/10 py-16 relative">
      <div class="absolute inset-0 border-t border-white/5" aria-hidden="true"></div>
      <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
          <div <?= reveal() ?>>
            <a href="/" class="inline-block mb-6" aria-label="MATMAZEL İzmit ana sayfa"><?= logo('minimal') ?></a>
            <p class="text-white/50 text-sm tracking-wide leading-relaxed font-light max-w-xs">
              İzmit'te Premium Saç &amp; Makyaj Stüdyosu. Hassasiyet ve sanatla hazırlanmış lüks güzellik hizmetleri.
            </p>
          </div>

          <nav <?= reveal() ?> aria-label="Alt menü">
            <h2 class="font-heading text-sm tracking-wider mb-6 text-champagne font-light uppercase">Navigasyon</h2>
            <ul class="space-y-3 text-sm text-white/50">
<?php foreach (NAV_ITEMS as $href => $label): ?>
              <li><a href="<?= e($href) ?>" class="hover:text-champagne transition-colors duration-300 font-light"><?= e($label) ?></a></li>
<?php endforeach; ?>
            </ul>
          </nav>

          <div <?= reveal() ?>>
            <h2 class="font-heading text-sm tracking-wider mb-6 text-champagne font-light uppercase">İletişim</h2>
            <address class="not-italic space-y-4 mb-6">
              <a href="<?= e(MAPS_URL) ?>" target="_blank" rel="noopener"
                 class="flex items-start space-x-3 text-white/50 hover:text-champagne transition-colors duration-300 group">
                <span class="w-10 h-10 border border-white/10 group-hover:border-champagne/50 transition-colors duration-300 flex items-center justify-center flex-shrink-0 text-champagne">
                  <?= icon('pin') ?>
                </span>
                <span class="font-light text-xs text-white/70 group-hover:text-champagne transition-colors leading-relaxed pt-1">
                  <?= e(ADDRESS_FULL) ?>
                </span>
              </a>

              <a href="<?= e(INSTAGRAM_URL) ?>" target="_blank" rel="noopener"
                 class="flex items-center space-x-3 text-white/50 hover:text-champagne transition-colors duration-300 group">
                <span class="w-10 h-10 border border-white/10 group-hover:border-champagne/50 transition-colors duration-300 flex items-center justify-center">
                  <?= icon('instagram') ?>
                </span>
                <span class="font-light"><?= e(INSTAGRAM_HANDLE) ?></span>
              </a>

              <a href="<?= e(WHATSAPP_URL) ?>" target="_blank" rel="noopener"
                 class="flex items-center space-x-3 text-white/50 hover:text-champagne transition-colors duration-300 group">
                <span class="w-10 h-10 border border-white/10 group-hover:border-champagne/50 transition-colors duration-300 flex items-center justify-center">
                  <?= icon('whatsapp') ?>
                </span>
                <span class="font-light">WhatsApp</span>
              </a>

              <a href="tel:<?= e(PHONE_E164) ?>"
                 class="flex items-center space-x-3 text-white/50 hover:text-champagne transition-colors duration-300 group">
                <span class="w-10 h-10 border border-white/10 group-hover:border-champagne/50 transition-colors duration-300 flex items-center justify-center">
                  <?= icon('phone') ?>
                </span>
                <span class="font-light"><?= e(PHONE_DISPLAY) ?></span>
              </a>
            </address>
<?php if (empty($page['hide_footer_map'])): ?>
            <div class="w-full h-48 md:h-64 rounded overflow-hidden border border-white/10">
              <iframe
                src="<?= e(MAPS_EMBED) ?>"
                width="100%" height="100%" style="border:0" allowfullscreen loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="opacity-80 hover:opacity-100 transition-opacity duration-300"
                title="MATMAZEL İzmit kuaför konumu - Google Haritalar"></iframe>
            </div>
<?php endif; ?>
          </div>
        </div>

        <div class="border-t border-white/5 pt-8 text-center">
          <a href="https://acdigital.tech/" class="text-white/30 text-xs tracking-wider font-light">
            &copy; <?= date('Y') ?> AC DIGITAL. Tüm hakları saklıdır.
          </a>
        </div>
      </div>
    </footer>
  </div>

<?php require ROOT_DIR . '/includes/popup.php'; ?>

  <script src="<?= e(asset('assets/js/main.js')) ?>" defer></script>
</body>
</html>
