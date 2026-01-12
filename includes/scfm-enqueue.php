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
            SCFM_PLUGIN_ASSEST_URI . 'css/scfm-style.css',
            [],
            time(),
            'all'
        );

        // Load all scripts
        wp_enqueue_script(
            'scfm-script-form',
            SCFM_PLUGIN_ASSEST_URI . 'js/scfm-script.js',
        ['jquery'],
            time(),
            true,
        );
        wp_enqueue_style('scfm-plugin-toast', 'https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css', [], '0.0.1', 'all');

        wp_localize_script(
            'scfm-script-form',
            'siteInfo', 
            array(
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('nonce_created'),
            )
            );

            wp_enqueue_script('scfm-plugin-toast', 'https://cdn.jsdelivr.net/npm/toastify-js', ['jquery'], '0.0.1', true);

    }

}