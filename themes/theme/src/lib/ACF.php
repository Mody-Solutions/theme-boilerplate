<?php

namespace App\lib;

class ACF
{
    public static function init() : void {
        self::action();
    }

    public static function action() : void {
        $animation_fields = [
            'entrance_animation',
            'super_title_animation',
            'title_animation',
            'subtitle_animation',
            'description_animation'
        ];
        foreach($animation_fields as $animation_field) {
            add_action("acf/load_field/name={$animation_field}", self::populateAnimationOptions(...));
        }
    }

    public static function populateAnimationOptions(array $field) : array {
        $field['choices'] = [
            'none' => __('None', APP_THEME_LOCALE),
            'fade' => __('Fade', APP_THEME_LOCALE),
            'fade-up' => __('Fade up', APP_THEME_LOCALE),
            'fade-down' => __('Fade down', APP_THEME_LOCALE),
            'fade-left' => __('Fade left', APP_THEME_LOCALE),
            'fade-right' => __('Fade right', APP_THEME_LOCALE),
            'flip-up' => __('Flip up', APP_THEME_LOCALE),
            'flip-down' => __('Flip down', APP_THEME_LOCALE),
            'flip-left' => __('Flip left', APP_THEME_LOCALE),
            'flip-right' => __('Flip right', APP_THEME_LOCALE),
            'slide-up' => __('Slide up', APP_THEME_LOCALE),
            'slide-down' => __('Slide down', APP_THEME_LOCALE),
            'slide-left' => __('Slide left', APP_THEME_LOCALE),
            'slide-right' => __('Slide right', APP_THEME_LOCALE),
        ];
        return $field;
    }
}