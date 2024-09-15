<?php
namespace App;
use App\additions\Login;
use App\config\Theme_Options;
use App\config\Theme_Setup;
use App\config\Timber_Setup;
use App\lib\Blocks;
use App\overrides\Security;
use App\overrides\Gutenberg;
use App\lib\ACF;

require_once WP_CONTENT_DIR . "/vendor/autoload.php";

define('APP_THEME_LOCALE', 'app');
define('APP_THEME_URL', get_stylesheet_directory_uri());
define('APP_THEME_DIR', __DIR__);

Theme_Setup::init();
Theme_Options::init();
Timber_Setup::init();
Gutenberg::init();
Security::init();
Blocks::init();
Login::init();
ACF::init();

$helpers = glob(APP_THEME_DIR . '/src/helpers/*.php');
if($helpers) {
    foreach($helpers as $helper) {
        if(is_file($helper)) require_once $helper;
    }
}