<?php

if (!class_exists('WP_List_table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Basic_Contact_Form_Admin extends WP_List_Table
{
    private $database;

    function __construct()
    {
        parent::__construct([
            'singular' => 'Submission',
            'plural' => 'Submissions',
            'ajax' => false,
        ]);

        $this->database = new Basic_Contact_Form_Database();
    }

    public function get_columns()
    {
        return [
            'cb' => '<input type="checkbox" />',
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'submitter_at' => 'Submitted At'
        ];
    }

    public function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'id':
                return esc_html($item[$column_name]);
            case 'name':
                return esc_html($item[$column_name]);
            case 'email':
                return esc_html($item[$column_name]);
            case 'subject':
                return esc_html($item[$column_name]);
            case 'submitter_at':
                return esc_html(date('Y-m-d H:i:s', strtotime($item[$column_name])));
            default:
                return print_r($item, true);
        }
    }

    public function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="submission[]" value ="%s" />',
            $item['id']
        );
    }


    function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = [];
        $sortable = [];
        $this->_column_headers = [$columns, $hidden, $sortable];
        $this->items = $this->database->get_submissions();

    }
    public function display_submissions_page()
    { ?>

        <div class="wrap">
            <h2 class="wp-heading-inline">
                Contact Form Submission
            </h2>
            <form action="post">
                <?php
                $this->prepare_items();
                $this->display();
                ?>
            </form>
        </div>';

    <? }

}