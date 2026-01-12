<?php

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

        $name = $form_values['name'];
        $email = $form_values['email'];
        $message = $form_values['message'];

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
        if (empty($message)) {
            wp_send_json_error(array(
                'message' => 'Message is required. Please enter your message.',
            ));
        }

    }
}