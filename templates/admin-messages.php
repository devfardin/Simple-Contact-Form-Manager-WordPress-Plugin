<?php

if (!defined('ABSPATH')) {
    exit;
}

if (is_admin()) {
    new Admin_messages();
}

class Admin_messages
{
    public function __construct()
    {
        $this->dispaly_table();

    }
    public function dispaly_table()
    {
        $simple_contact_form = new Simple_Contact_List_Table();
        $simple_contact_form->prepare_items();
        ?>
        <div class="wrap">
            <div id="icon-users" class="icon32"></div>
            <h2>Example List Table Page</h2>
            <?php $simple_contact_form->display(); ?>
        </div>
        <?php
    }

}

if (class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Simple_Contact_List_Table extends WP_List_Table
{

    public function prepare_items()
    {

        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();

        $data = $this->table_data();

        usort($data, array(&$this, 'sort_data'));

        $perPage = 10;
        $currentPage = $this->get_pagenum();
        $totalItems = count($data);

        $this->set_pagination_args(array(
            'total_items' => $totalItems,
            'per_page' => $perPage,
        ));

        $data = array_slice($data, (($currentPage - 1) * $perPage), $perPage);
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $data;

    }



    public function get_columns()
    {
        $columns = array(
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'submited' => 'Submited',
            'read' => 'Read',
            'action' => 'Action'
        );
        return $columns;
    }


    public function get_hidden_columns()
    {
        return array();
    }

    public function get_sortable_columns()
    {
        return array('email' => array('email'));
    }

    private function table_data()
    {
        global $wpdb;
        echo $wpdb->last_error;
        $table_name = $wpdb->prefix . 'scfm_messages';

        $results = $wpdb->get_results(
            "SELECT id, name, email, created_at 
         FROM $table_name 
         ORDER BY created_at ASC",
            ARRAY_A
        );

        $data = array();

        if (!empty($results)) {
            foreach ($results as $row) {

                $data[] = array(
                    'id' => (int) $row['id'],
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'submited' => $row['created_at'],
                    'read' => 'Read',
                    'action' => '<button id="delete_customer_message"> Delete </button>',
                );
            }
        }
        return $data;
    }



    public function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'id':
            case 'name':
            case 'email':
            case 'submited':
            case 'read':
            case 'action':
                return $item[$column_name];

            default:
            return print_r($item, true);
        }
    }

    private function sort_data($a, $b)
    {
        $orderby = !empty($_GET['orderby']) ? $_GET['orderby'] : 'name';
        $order = !empty($_GET['order']) ? $_GET['order'] : 'asc';

        $result = strcmp($a[$orderby], $b[$orderby]);

        return ($order === 'asc') ? $result : -$result;
    }

}