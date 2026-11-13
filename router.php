<?php
/**
 * Yalnızca yerel geliştirme içindir: php -S localhost:8000 router.php
 * Canlı sunucuda aynı kuralları .htaccess uygular.
 */
if (isset($_GET['nopopup'])) {
    define('DEV_NO_POPUP', true);
}
$uri  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = rawurldecode($uri);

if (preg_match('#^/(includes|resources|node_modules|\.git)(/|$)#', $path)
    || preg_match('#^/(package(-lock)?\.json|tailwind\.config\.js|router\.php|README\.md)$#', $path)) {
    http_response_code(403);
    require __DIR__ . '/404.php';
    return true;
}
if ($path === '/sitemap 2.xml' || $path === '/sitemap.php') {
    header('Location: /sitemap.xml', true, 301);
    return true;
}
if (preg_match('#^/index\.(php|html?)$#', $path)) {
    header('Location: /', true, 301);
    return true;
}
if (preg_match('#^/([a-z0-9-]+)\.php$#', $path, $m) && $m[1] !== 'sitemap') {
    header('Location: /' . $m[1], true, 301);
    return true;
}
if ($path !== '/' && str_ends_with($path, '/')) {
    header('Location: ' . rtrim($path, '/'), true, 301);
    return true;
}
if ($path === '/sitemap.xml') {
    require __DIR__ . '/sitemap.php';
    return true;
}
if ($path === '/') {
    require __DIR__ . '/index.php';
    return true;
}
if (is_file(__DIR__ . $path)) {
    return false; // statik dosya
}
if (preg_match('#^/([a-z0-9-]+)$#', $path, $m) && is_file(__DIR__ . '/' . $m[1] . '.php')) {
    require __DIR__ . '/' . $m[1] . '.php';
    return true;
}
require __DIR__ . '/404.php';
return true;
