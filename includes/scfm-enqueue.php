<?php

if(!defined('ABSPATH')) {
    exit;
}

class scfm_enqueue{
    public function __construct(){
        add_action('wp_enqueue_scripts', [$this, 'scfm_enqueue_assets']);
    }
    public function scfm_enqueue_assets(){
        // load all Style here
        wp_enqueue_style(
            'scfm-style',
            SCFM_PLUGIN_ASSEST_URI . 'css/scfm-style.css'
        );
    }

}