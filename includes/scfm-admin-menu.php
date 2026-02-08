<?php

if (!defined('ABSPATH')) {
    exit;
}
class Scfm_admin_page
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'scfm_register_admin_menu']);

    }
    public function scfm_register_admin_menu()
    {
        add_menu_page(
            'Contact Submissions',
            'Contact Forms',
            'manage_options',
            'basic-contact-submissions',
            'scfm_rander_messages_page',
            'dashicons-feedback',
            26
        );


        function scfm_rander_messages_page()
        {
           require_once SCFM_PLUGIN_INCLUDES_PATH . 'scfm-admin.php';
           $admin = new Basic_Contact_Form_Admin();
           $admin->display_submissions_page();
        }
    }
}

