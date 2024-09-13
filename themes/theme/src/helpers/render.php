<?php
use App\lib\Blocks;

if(!function_exists('app_render')) {
    function app_render($block, $content, $is_preview) : void {
        App\lib\Blocks::render($block, $content, $is_preview);
    }
}