<?php

namespace App\additions;

class Login
{
    public static function init(): void
    {
        add_action('login_enqueue_scripts', self::login_enqueue_scripts(...));
        add_action('login_headerurl', self::login_headerurl(...));
    }

    public static function login_enqueue_scripts(): void
    {
        wp_enqueue_style('app');
    }

    public static function login_headerurl(): string
    {
        return home_url();
    }
}