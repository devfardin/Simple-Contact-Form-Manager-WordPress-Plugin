<?php 

class Scfm_activator{
    
    public function scfm_create_database(){
        global $wpdb;

        $table_name = $wpdb->prefix . 'scfm_messages';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name(
        `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(255) NOT NULL,
        `email` VARCHAR(255) NOT NULL,
        `message` TEXT DEFAULT NULL,
        `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
        `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
        ) $charset_collate;"; 
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql); 
    }
}