<?php

if ( ! defined( 'ABSPATH' ) ) {
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
            'Contact Messages',
            'Contact Messages',
            'manage_options',
            'scfm-messages',
            'scfm_rander_messages_page',
            'dashicons-email',
            26
        );


        function scfm_rander_messages_page(){
        	
    }
    }
    

}