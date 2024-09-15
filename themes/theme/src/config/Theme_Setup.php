<?php

namespace App\config;

class Theme_Setup {
	public static function init(): void {
		add_action( 'init', self::wp_init( ... ), 100 );
        add_action( 'wp_enqueue_scripts', self::wp_enqueue_scripts( ... ), 100 );
        add_action('login_enqueue_scripts', self::wp_enqueue_scripts(...), 100);
        add_action('enqueue_block_assets', self::enqueue_block_assets(...), 9999999);
    }

	public static function wp_init() : void {
		register_nav_menus([
			'header_menu' => __('Header menu'),
			'footer_top_menu' => __('Footer top menu'),
			'footer_bottom_menu' => __('Footer bottom menu')
		]);
	}

	public static function wp_enqueue_scripts(): void {
		foreach ( self::scripts() as $script ) {
			wp_register_script(
				$script['handle'],
				$script['url'],
				$script['deps'],
				$script['ver'],
				$script['args']
			);
            if($script['handle'] !== 'editor')
                wp_enqueue_script( $script['handle'] );
		}

		foreach ( self::styles() as $style ) {
			wp_register_style(
				$style['handle'],
				$style['url'],
				$style['deps'],
				$style['ver'],
				$style['media']
			);
            if($style['handle'] !== 'editor')
			    wp_enqueue_style($style['handle']);
		}
	}

    public static function enqueue_block_assets() : void {
        wp_enqueue_script('editor');
        wp_enqueue_style('editor');
    }

	private static function scripts(): array {
        $app_file = APP_THEME_DIR . '/assets/dist/app.asset.php';
        if(is_file($app_file)) {
            $app = require $app_file;
            return [
                [
                    'handle' => 'app',
                    'url'    => APP_THEME_URL . '/assets/dist/app.js',
                    'ver'    => $app['version'],
                    'deps'   => $app['dependencies'],
                    'args'  => [ 'in_footer' => true, 'defer' => true ]
                ],
                [
                    'handle' => 'editor',
                    'url'    => APP_THEME_URL . '/assets/dist/editor.js',
                    'ver'    => $app['version'],
                    'deps'   => $app['dependencies'],
                    'args'  => [ 'in_footer' => true, 'defer' => true ]
                ],
            ];
        }
        return [];
	}

	private static function styles(): array {
        $app_file = APP_THEME_DIR . '/assets/dist/app.asset.php';
        if(is_file($app_file)) {
            $app = require APP_THEME_DIR . '/assets/dist/app.asset.php';
            return [
                [
                    'handle' => 'app',
                    'url'    => APP_THEME_URL . '/assets/dist/app.css',
                    'ver'    => $app['version'],
                    'deps'   => null,
                    'media'  => 'all'
                ],
                [
                    'handle' => 'editor',
                    'url'    => APP_THEME_URL . '/assets/dist/editor.css',
                    'ver'    => $app['version'],
                    'deps'   => null,
                    'media'  => 'all'
                ],
            ];
        }
	}
}