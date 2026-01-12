<?php 
/**
 * Plugin Name: Sinple Contact Form Manager
 * Description: It's a Simple Contact form Manager Plugin, that will be help to collect information from clients
 * Tags: Contact From, Simple Contact Form
 * Plugin URI: https://simple-contact-form-management.com
 * Version: 1.0.0
 * Author: Fardin Ahmed
 * Author URI: https://github.com/devfardin
 * Text Domain: scfm
 */

if(!defined(("ABSPATH"))){
    exit;
}

if(!defined('SCFM_ASSEST_URI')){
    define('SCFM_ASSEST_URI', plugin_dir_url(__FILE__) . 'assets/');
}
if(!defined('SCFM_PATH')){
    define('SCFM_INCLUDES_PATH', plugin_dir_path(__FILE__) . 'includes/');
}
// if(!defined('SCFM_TEMPLETE_PATH')){
//     define('SCFM_TEMPLETE_PATH', plugin_dir_path(__FILE__), case_insensitive: 'templates/');
// }

class Simple_contact_form_manager{
    public function __construct(){
        $this->load_depandancy();
        $this->init();
    }
    public function load_depandancy(){
        include_once( SCFM_INCLUDES_PATH . 'scfm-shortcode.php');

    }
    public function init(){
        new Scfm_shortcode();
    }

}
new Simple_contact_form_manager();