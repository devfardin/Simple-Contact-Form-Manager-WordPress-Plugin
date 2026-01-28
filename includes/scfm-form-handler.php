<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Form handler
class Scfm_form_handler
{
    public function __construct()
    {
        add_action('wp_ajax_nopriv_scfm_form_action', [$this, 'scfm_form_submition_handler']);
        add_action('wp_ajax_scfm_form_action', [$this, 'scfm_form_submition_handler']);
    }
    public function scfm_form_submition_handler()
    {
        parse_str($_REQUEST['form_data'], $form_values);

        // Nonce Validation
        if (!wp_verify_nonce($_REQUEST['nonce'], 'nonce_created')) {
            wp_send_json_error(array(
                'message' => 'Unauthorized Request',
            ));
        }

        $name = sanitize_text_field($form_values['name']);
        $email = sanitize_email($form_values['email']);
        $subject = sanitize_text_field($form_values['subject']);
        $message = sanitize_textarea_field($form_values['message']);

        if (empty($name)) {
            wp_send_json_error(array(
                'message' => 'Name is required. Please enter your name.',
            ));
        }
        if (empty($email)) {
            wp_send_json_error(array(
                'message' => 'Email is required. Please enter your email address.',
            ));
        }
        // if (empty($subject)) {
        //     wp_send_json_error(array(
        //         'message' => 'Subject is required. Please enter your email address.',
        //     ));
        // }
        if (empty($message)) {
            wp_send_json_error(array(
                'message' => 'Message is required. Please enter your message.',
            ));
        }
        global $wpdb;
        $table_name = $wpdb->prefix . 'scfm_messages';
        $query = $wpdb->insert($table_name, array(
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ));

        if($query){
            wp_send_json_success(array(
                'message'=> 'Form Submited Successfully',
            ));
        } else {
            wp_send_json_error([
                'message' => 'Failed to save data. Please try again later.',
                'error' => $wpdb->last_error, // shows DB error if any
            ]);
        }
    }
}