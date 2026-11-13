<?php
/**
 * Her sayfanın en başında yüklenir.
 */
define('MATMAZEL', true);
define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/includes/config.php';
require ROOT_DIR . '/includes/functions.php';

header('Content-Type: text/html; charset=UTF-8');
