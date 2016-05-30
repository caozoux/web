<?php

$currentDir = dirname(__FILE__);
/* Custom defines made by users */
if (is_file($currentDir.'/defines_custom.inc.php')) {
    include_once($currentDir.'/defines_custom.inc.php');
}
require_once($currentDir.'/defines.inc.php');
$start_time = microtime(true);
/* SSL configuration */
define('_PS_SSL_PORT_', 443);

/* Improve PHP configuration to prevent issues */
ini_set('default_charset', 'utf-8');
ini_set('magic_quotes_runtime', 0);
ini_set('magic_quotes_sybase', 0);
/* Improve PHP configuration to prevent issues */
ini_set('default_charset', 'utf-8');
ini_set('magic_quotes_runtime', 0);
ini_set('magic_quotes_sybase', 0);

/* correct Apache charset (except if it's too late */
if (!headers_sent()) {
    header('Content-Type: text/html; charset=utf-8');
}

/* include settings file only if we are not in multi-tenancy mode */
require_once(_PS_ROOT_DIR_.'/config/settings.inc.php');
require_once(_PS_CONFIG_DIR_.'autoload.php');

require_once $currentDir . DIRECTORY_SEPARATOR . 'bootstrap.php';

if (_PS_DEBUG_PROFILING_) {
    include_once(_PS_TOOL_DIR_.'profiling/Controller.php');
    include_once(_PS_TOOL_DIR_.'profiling/ObjectModel.php');
    include_once(_PS_TOOL_DIR_.'profiling/Db.php');
    include_once(_PS_TOOL_DIR_.'profiling/Tools.php');
}

if (Tools::convertBytes(ini_get('upload_max_filesize')) < Tools::convertBytes('100M')) {
    ini_set('upload_max_filesize', '100M');
}

if (Tools::isPHPCLI() && isset($argc) && isset($argv)) {
    Tools::argvToGET($argc, $argv);
}

/* Trying to redefine HTTP_HOST if empty (on some webservers...) */
if (!isset($_SERVER['HTTP_HOST']) || empty($_SERVER['HTTP_HOST'])) {
    $_SERVER['HTTP_HOST'] = @getenv('HTTP_HOST');
}

$context = Context::getContext();

define('_THEME_NAME_', $theme_name);
define('__PS_BASE_URI__', $context->shop->getBaseURI());

/* Include all defines related to base uri and theme name */
require_once($currentDir.'/defines_uri.inc.php');

global $_MODULES;
$_MODULES = array();

define('_PS_PRICE_DISPLAY_PRECISION_', Configuration::get('PS_PRICE_DISPLAY_PRECISION'));
define('_PS_PRICE_COMPUTE_PRECISION_', _PS_PRICE_DISPLAY_PRECISION_);

if (Configuration::get('PS_USE_HTMLPURIFIER')) {
    require_once(_PS_TOOL_DIR_.'htmlpurifier/HTMLPurifier.standalone.php');
}

/* It is not safe to rely on the system's timezone settings, and this would generate a PHP Strict Standards notice. */
@date_default_timezone_set(Configuration::get('PS_TIMEZONE'));

/* Set locales */
$locale = strtolower(Configuration::get('PS_LOCALE_LANGUAGE')).'_'.strtoupper(Configuration::get('PS_LOCALE_COUNTRY'));
/* Please do not use LC_ALL here http://www.php.net/manual/fr/function.setlocale.php#25041 */
setlocale(LC_COLLATE, $locale.'.UTF-8', $locale.'.utf8');
setlocale(LC_CTYPE, $locale.'.UTF-8', $locale.'.utf8');
setlocale(LC_TIME, $locale.'.UTF-8', $locale.'.utf8');
setlocale(LC_NUMERIC, 'en_US.UTF-8', 'en_US.utf8');

/* Instantiate cookie */
$cookie_lifetime = defined('_PS_ADMIN_DIR_') ? (int)Configuration::get('PS_COOKIE_LIFETIME_BO') : (int)Configuration::get('PS_COOKIE_LIFETIME_FO');
if ($cookie_lifetime > 0) {
    $cookie_lifetime = time() + (max($cookie_lifetime, 1) * 3600);
}

if (defined('_PS_ADMIN_DIR_')) {
    $cookie = new Cookie('psAdmin', '', $cookie_lifetime);
} else {
    $force_ssl = Configuration::get('PS_SSL_ENABLED') && Configuration::get('PS_SSL_ENABLED_EVERYWHERE');
    if ($context->shop->getGroup()->share_order) {
        $cookie = new Cookie('ps-sg'.$context->shop->getGroup()->id, '', $cookie_lifetime, $context->shop->getUrlsSharedCart(), false, $force_ssl);
    } else {
        $domains = null;
        if ($context->shop->domain != $context->shop->domain_ssl) {
            $domains = array($context->shop->domain_ssl, $context->shop->domain);
        }

        $cookie = new Cookie('ps-s'.$context->shop->id, '', $cookie_lifetime, $domains, false, $force_ssl);
    }
}

$context->cookie = $cookie;

/* Create employee if in BO, customer else */
if (defined('_PS_ADMIN_DIR_')) {
    $employee = new Employee($cookie->id_employee);
    $context->employee = $employee;

    /* Auth on shops are recached after employee assignation */
    if ($employee->id_profile != _PS_ADMIN_PROFILE_) {
        Shop::cacheShops(true);
    }

    $cookie->id_lang = (int)$employee->id_lang;
}

$context->language = $language;
