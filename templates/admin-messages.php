<?php

if (!defined('ABSPATH')) {
    exit;
}

class Admin_messages
{
    public function __construct()
    {
        $this->dispaly_table();

    }
    public function dispaly_table()
    {
        echo "<div class='wrap'>";
        echo '<h1>Contact Messages</h1>';
        echo "</div>";
    }

}

new Admin_messages();