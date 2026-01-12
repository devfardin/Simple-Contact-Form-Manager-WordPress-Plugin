<?php

class Scfm_shortcode{
    public function __construct(){
        add_shortcode('rander_simple_contact_form', [$this, 'simple_contact_form']);
    }
    public function simple_contact_form(){
        ob_start();
        require_once( plugin_dir_path(__DIR__) . 'templates/contact-form.php');
        return ob_get_clean();
    }
    
}