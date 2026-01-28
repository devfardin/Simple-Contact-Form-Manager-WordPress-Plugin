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

if (!defined(("ABSPATH"))) {
    exit;
}

if (!defined('SCFM_PLUGIN_ASSEST_URI')) {
    define('SCFM_PLUGIN_ASSEST_URI', plugin_dir_url(__FILE__) . 'assets/');
}
if (!defined('SCFM_PLUGIN_INCLUDES_PATH')) {
    define('SCFM_PLUGIN_INCLUDES_PATH', plugin_dir_path(__FILE__) . 'includes/');
}
if (!defined('SCFM_PLUGIN_TEMPLATES_PATH')) {
    define('SCFM_PLUGIN_TEMPLATES_PATH', plugin_dir_path(__FILE__) . 'templates/');
}
if (!defined('SCFM_PLUGIN_VERSION')) {
    define('SCFM_PLUGIN_VERSION', '1.0.0');
}

class Simple_contact_form_manager
{
    public function __construct()
    {
        $this->load_depandancy();
        $this->init();
        $this->Scfm_Activator();
    }
    public function load_depandancy()
    {
        include_once(SCFM_PLUGIN_INCLUDES_PATH . 'scfm-shortcode.php');
        include_once(SCFM_PLUGIN_INCLUDES_PATH . 'scfm-enqueue.php');
        include_once(SCFM_PLUGIN_INCLUDES_PATH . 'scfm-form-handler.php');
        include_once(SCFM_PLUGIN_INCLUDES_PATH . 'scfm-admin-page.php');
        include_once(SCFM_PLUGIN_INCLUDES_PATH . 'database.php');

    }
    public function init()
    {
        new Scfm_shortcode();
        new scfm_enqueue();
        new Scfm_form_handler();
        new scfm_admin_page();
    }
    public function Scfm_Activator()
    {
        register_activation_hook(__FILE__, [$this, 'scfm_activation_hook']);
    }
    public function scfm_activation_hook()
    {
        $database = new Basic_Contact_Form_Database();
        $database->create_table();

    }
}
new Simple_contact_form_manager();