<?php
/**
 * "Yeni salonumuza taşındık" karşılama popup'ı.
 * Oturum başına bir kez gösterilir (sessionStorage) — davranış assets/js/main.js içinde.
 */
if (!defined('MATMAZEL')) {
    http_response_code(403);
    exit;
}
if (defined('DEV_NO_POPUP')) {
    return; // yalnızca yerel ekran görüntüsü testleri için (router.php)
}
?>
  <div class="popup fixed inset-0 z-[100] flex items-center justify-center p-3 sm:p-6 overflow-y-auto"
       role="dialog" aria-modal="true" aria-labelledby="popup-baslik" hidden data-popup>
    <div class="popup-backdrop fixed inset-0 bg-black/85 backdrop-blur-md" data-popup-close></div>

    <div tabindex="-1" class="popup-card outline-none relative z-10 w-full max-w-2xl bg-[#0d0d0d] border border-champagne/40 rounded-2xl shadow-2xl overflow-hidden flex flex-col my-auto">
      <div class="flex items-center justify-between px-4 sm:px-6 py-3.5 border-b border-white/10 bg-black/70">
        <div class="flex items-center space-x-2">
          <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse" aria-hidden="true"></span>
          <p id="popup-baslik" class="text-xs uppercase tracking-widest text-champagne font-light">Yeni Salonumuza Taşındık</p>
        </div>
        <button type="button" data-popup-close
                class="w-8 h-8 rounded-full border border-white/20 hover:border-champagne text-white/70 hover:text-champagne flex items-center justify-center transition-colors duration-300"
                aria-label="Kapat">
          <?= icon('close', 'w-4 h-4') ?>
        </button>
      </div>

      <div class="bg-white p-2 sm:p-3 flex items-center justify-center">
        <?= img('matmazel-izmit-yeni-salon-kroki', 'MATMAZEL İzmit yeni salon adresi kroki ve duyuru: ' . ADDRESS_FULL, [
            'class' => 'w-full h-auto max-h-[68vh] object-contain rounded-lg',
            'sizes' => '(min-width: 672px) 672px, 100vw',
        ]) ?>
      </div>

      <div class="p-3.5 sm:p-4 bg-[#0a0a0a] border-t border-white/10 flex flex-col sm:flex-row gap-3 items-center justify-between">
        <div class="flex flex-wrap gap-2.5 w-full sm:w-auto">
          <a href="<?= e(MAPS_URL) ?>" target="_blank" rel="noopener"
             class="flex-1 sm:flex-initial inline-flex items-center justify-center space-x-2 px-4 py-2.5 bg-champagne text-black text-xs font-medium tracking-wider uppercase hover:bg-champagne/90 transition-all duration-300 rounded">
            <?= icon('pin', 'w-4 h-4') ?>
            <span>Yol Tarifi Al</span>
          </a>
          <a href="<?= e(INSTAGRAM_URL) ?>" target="_blank" rel="noopener"
             class="flex-1 sm:flex-initial inline-flex items-center justify-center space-x-2 px-4 py-2.5 border border-white/20 hover:border-champagne text-white/80 hover:text-champagne text-xs font-light tracking-wider transition-all duration-300 rounded">
            <span>Instagram</span>
          </a>
        </div>
        <button type="button" data-popup-close
                class="w-full sm:w-auto text-xs text-white/50 hover:text-white transition-colors duration-300 py-1 sm:py-0 font-light underline underline-offset-4">
          Siteye Devam Et
        </button>
      </div>
    </div>
  </div>
