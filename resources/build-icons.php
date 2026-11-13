<?php
/**
 * Favicon ve Open Graph görselini üretir.
 * Kullanım: php resources/build-icons.php
 */
$root = dirname(__DIR__);
$img  = $root . '/assets/img';
$font = '/System/Library/Fonts/Supplemental/Futura.ttc';
if (!is_file($font)) {
    $font = '/System/Library/Fonts/Supplemental/Georgia.ttf';
}

const CHAMPAGNE = [212, 194, 168];

/**
 * Favicon: MATMAZEL logosu (resources/originals/logo-white.png) siyah kare zemin üzerinde.
 * Önce 1024 px'te çizilir, sonra her boyuta yüksek kaliteyle küçültülür.
 */
$logo = imagecreatefrompng($root . '/resources/originals/logo-white.png');
$master = imagecreatetruecolor(1024, 1024);
imagefill($master, 0, 0, imagecolorallocate($master, 0, 0, 0));
imagealphablending($master, true);
$pad = (int)round(1024 * 0.07);
$lw = 1024 - 2 * $pad;
$lh = (int)round(imagesy($logo) * $lw / imagesx($logo));
imagecopyresampled($master, $logo, $pad, (int)((1024 - $lh) / 2), 0, 0, $lw, $lh, imagesx($logo), imagesy($logo));

$pngs = [];
foreach ([16, 32, 48, 180, 192, 512] as $s) {
    $im = imagecreatetruecolor($s, $s);
    imagecopyresampled($im, $master, 0, 0, 0, 0, $s, $s, 1024, 1024);
    $name = $s === 180 ? 'apple-touch-icon.png' : "favicon-$s.png";
    $path = $root . '/' . $name;
    imagepng($im, $path, 9);
    if (in_array($s, [16, 32, 48], true)) {
        $pngs[$s] = file_get_contents($path);
    }
}

// favicon.ico (PNG gömülü ICO)
$ico   = pack('vvv', 0, 1, count($pngs));
$off   = 6 + 16 * count($pngs);
$data  = '';
foreach ($pngs as $s => $png) {
    $ico  .= pack('CCCCvvVV', $s, $s, 0, 0, 1, 32, strlen($png), $off + strlen($data));
    $data .= $png;
}
file_put_contents($root . '/favicon.ico', $ico . $data);

// Open Graph görseli 1200x630: solda logo + metin, sağda fotoğraf
$og = imagecreatetruecolor(1200, 630);
imagefill($og, 0, 0, imagecolorallocate($og, 0, 0, 0));
$photo = imagecreatefromwebp($img . '/izmit-kuafor-kullu-kumral-balyaj-1-1200.webp');
// Fotoğraftan 600x630 oranında, yüzü içeren bir kesit al
$srcW = imagesx($photo);
$cropW = $srcW;
$cropH = (int)round($cropW * 630 / 600);
imagecopyresampled($og, $photo, 600, 0, 0, 180, 600, 630, $cropW, $cropH);

$logo = imagecreatefrompng($root . '/resources/originals/logo-white.png');
imagealphablending($og, true);
$lw = 380;
$lh = (int)round(imagesy($logo) * $lw / imagesx($logo));
imagecopyresampled($og, $logo, 110, 140, 0, 0, $lw, $lh, imagesx($logo), imagesy($logo));

$champ = imagecolorallocate($og, ...CHAMPAGNE);
$grey  = imagecolorallocate($og, 200, 200, 200);
imagefilledrectangle($og, 250, 450, 350, 451, $champ);
$t1 = 'İZMİT KADIN KUAFÖRÜ';
$b  = imagettfbbox(22, 0, $font, $t1);
imagettftext($og, 22, 0, (int)(300 - ($b[2] - $b[0]) / 2), 500, $champ, $font, $t1);
$t2 = 'Saç & Makyaj Stüdyosu';
$b  = imagettfbbox(17, 0, $font, $t2);
imagettftext($og, 17, 0, (int)(300 - ($b[2] - $b[0]) / 2), 540, $grey, $font, $t2);

imagejpeg($og, $img . '/og-matmazel-izmit.jpg', 85);
echo "İkonlar ve OG görseli hazır.\n";
