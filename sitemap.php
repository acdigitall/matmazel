<?php
/**
 * /sitemap.xml olarak sunulur (.htaccess). Görsel site haritası uzantısı içerir.
 */
define('MATMAZEL', true);
define('ROOT_DIR', __DIR__);
require ROOT_DIR . '/includes/config.php';
require ROOT_DIR . '/includes/functions.php';

header('Content-Type: application/xml; charset=UTF-8');

$files = [
    '/'           => ['index.php',      'weekly',  '1.0'],
    '/hizmetler'  => ['hizmetler.php',  'monthly', '0.9'],
    '/hakkimizda' => ['hakkimizda.php', 'monthly', '0.8'],
    '/iletisim'   => ['iletisim.php',   'monthly', '0.8'],
    '/galeri'     => ['galeri.php',     'monthly', '0.7'],
];

$configTime = filemtime(ROOT_DIR . '/includes/config.php');

$images = [
    '/'          => [['matmazel-izmit-salon-ic-mekan', 'MATMAZEL İzmit kadın kuaförü salon iç mekânı']],
    '/hizmetler' => array_map(fn($s) => [$s['image'], $s['alt']], SERVICES),
    '/galeri'    => array_map(fn($g) => [$g[0], $g[1]], GALLERY),
];

echo '<?xml version="1.0" encoding="UTF-8"?>', "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
<?php foreach ($files as $path => [$file, $freq, $prio]):
    $mtime = max(filemtime(ROOT_DIR . '/' . $file), $configTime); ?>
  <url>
    <loc><?= e(abs_url($path)) ?></loc>
    <lastmod><?= date('Y-m-d', $mtime) ?></lastmod>
    <changefreq><?= $freq ?></changefreq>
    <priority><?= $prio ?></priority>
<?php foreach ($images[$path] ?? [] as [$name, $caption]): ?>
    <image:image>
      <image:loc><?= e(abs_url('/assets/img/' . $name . '-1200.webp')) ?></image:loc>
    </image:image>
<?php endforeach; ?>
  </url>
<?php endforeach; ?>
</urlset>
