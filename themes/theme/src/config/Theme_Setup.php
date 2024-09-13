<?php

namespace App\config;

class Theme_Setup {
	public static function init(): void {
		add_action( 'init', self::wp_init( ... ), 100 );
        add_action( 'wp_enqueue_scripts', self::wp_enqueue_scripts( ... ), 100 );
        add_action('login_enqueue_scripts', self::wp_enqueue_scripts(...), 100);
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
			wp_enqueue_style($style['handle']);
		}
	}

	private static function scripts(): array {
		$app = include( APP_THEME_DIR . '/assets/dist/app.asset.php' );
		return [
			[
				'handle' => 'app',
				'url'    => APP_THEME_URL . '/assets/dist/app.js',
				'ver'    => $app['version'],
				'deps'   => $app['dependencies'],
				'args'  => [ 'in_footer' => true, 'defer' => true ]
			]
		];
	}

	private static function styles(): array {
		$app = include( APP_THEME_DIR . '/assets/dist/app.asset.php' );
		return [
			[
				'handle' => 'app',
				'url'    => APP_THEME_URL . '/assets/dist/app.css',
				'ver'    => $app['version'],
				'deps'   => null,
				'media'  => 'all'
			]
		];
	}
}