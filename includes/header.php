<?php
/**
 * <head> + site üst menüsü. Çağıran sayfa $page dizisini tanımlar:
 *   title, description, path, og_image?, robots?, breadcrumb?, schema_extra?, preload_image?
 */
if (!defined('MATMAZEL')) {
    http_response_code(403);
    exit;
}

$canonical = abs_url($page['path']);
$ogImage   = abs_url($page['og_image'] ?? OG_IMAGE);
$active    = current_path();
?>
<!doctype html>
<html lang="tr" prefix="og: https://ogp.me/ns#">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($page['title']) ?></title>
  <meta name="description" content="<?= e($page['description']) ?>">
<?php if (!empty($page['keywords'])): ?>
  <meta name="keywords" content="<?= e($page['keywords']) ?>">
<?php endif; ?>
  <meta name="author" content="MATMAZEL">
  <meta name="robots" content="<?= e($page['robots'] ?? 'index, follow, max-image-preview:large') ?>">
<?php if (($page['robots'] ?? '') === ''): ?>
  <link rel="canonical" href="<?= e($canonical) ?>">
<?php endif; ?>

  <!-- Yerel işletme sinyalleri -->
  <meta name="geo.region" content="TR-41">
  <meta name="geo.placename" content="İzmit, Kocaeli">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="tr_TR">
  <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
  <meta property="og:url" content="<?= e($canonical) ?>">
  <meta property="og:title" content="<?= e($page['og_title'] ?? $page['title']) ?>">
  <meta property="og:description" content="<?= e($page['description']) ?>">
  <meta property="og:image" content="<?= e($ogImage) ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="MATMAZEL İzmit kadın kuaförü - saç ve makyaj stüdyosu">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= e($page['og_title'] ?? $page['title']) ?>">
  <meta name="twitter:description" content="<?= e($page['description']) ?>">
  <meta name="twitter:image" content="<?= e($ogImage) ?>">

  <!-- İkonlar -->
  <link rel="icon" href="/favicon.ico" sizes="48x48">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/favicon-192.png">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <link rel="manifest" href="/site.webmanifest">
  <meta name="theme-color" content="#000000">

  <!-- Yazı tipleri -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Montserrat:wght@300;400;500&display=swap">

<?php if (!empty($page['preload_image'])): ?>
  <link rel="preload" as="image" type="image/webp" href="<?= e($page['preload_image']) ?>" fetchpriority="high">
<?php endif; ?>
  <link rel="stylesheet" href="<?= e(asset('assets/css/style.css')) ?>">
  <script>(function(d){d.classList.add('js');setTimeout(function(){if(!window.__matmazel)d.classList.remove('js')},3000)})(document.documentElement);</script>

  <?= render_schema($page) ?>

</head>
<body class="bg-black text-white">
  <a href="#icerik" class="skip-link">İçeriğe geç</a>
  <div class="min-h-screen flex flex-col bg-black">

    <header class="site-header fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-black/80 backdrop-blur-sm border-b border-white/5" data-header>
      <nav class="container mx-auto px-6 py-5 flex items-center justify-between" aria-label="Ana menü">
        <a href="/" class="flex items-center z-50" aria-label="MATMAZEL İzmit ana sayfa">
          <?= logo('minimal') ?>
        </a>

        <ul class="hidden md:flex items-center space-x-10">
<?php foreach (NAV_ITEMS as $href => $label): $isActive = $active === $href; ?>
          <li>
            <a href="<?= e($href) ?>"<?= $isActive ? ' aria-current="page"' : '' ?>
               class="relative text-sm tracking-wider transition-all duration-300 font-light <?= $isActive ? 'text-champagne' : 'text-white/70 hover:text-champagne' ?>">
              <?= e($label) ?>
<?php if ($isActive): ?>
              <span class="nav-underline absolute -bottom-1 left-0 right-0 h-px bg-champagne" aria-hidden="true"></span>
<?php endif; ?>
            </a>
          </li>
<?php endforeach; ?>
        </ul>

        <button type="button"
                class="md:hidden text-white/70 hover:text-white transition-colors z-50 relative"
                aria-label="Menüyü aç" aria-expanded="false" aria-controls="mobil-menu" data-menu-toggle>
          <span class="menu-icon menu-icon--open"><?= icon('menu', 'w-6 h-6') ?></span>
          <span class="menu-icon menu-icon--close"><?= icon('close-thin', 'w-6 h-6') ?></span>
        </button>
      </nav>

      <!-- Mobil menü -->
      <div class="mobile-overlay fixed inset-0 bg-black/95 backdrop-blur-md z-40 md:hidden" data-menu-overlay></div>
      <div id="mobil-menu" class="mobile-panel fixed top-20 left-0 right-0 bg-black backdrop-blur-md border-b border-white/10 z-40 md:hidden">
        <ul class="container mx-auto px-6 py-8 space-y-6 bg-black">
<?php $i = 0; foreach (NAV_ITEMS as $href => $label): $isActive = $active === $href; ?>
          <li style="--i:<?= $i++ ?>">
            <a href="<?= e($href) ?>"<?= $isActive ? ' aria-current="page"' : '' ?>
               class="block text-base tracking-wider transition-colors duration-300 py-2 font-light <?= $isActive ? 'text-champagne border-l-2 border-champagne pl-4' : 'text-white/70 hover:text-champagne pl-4' ?>">
              <?= e($label) ?>
            </a>
          </li>
<?php endforeach; ?>
        </ul>
      </div>
    </header>

    <main id="icerik" class="flex-grow">
