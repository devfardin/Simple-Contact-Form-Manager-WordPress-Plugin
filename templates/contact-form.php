<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<!-- SCFM - Form -->
<div class="scfm-container">
    <form id="scfm-form" method="post">
        <div class="scfm-input_wrap">
            <label for="name">
                Enter Name
            </label>
            <input type="text" id="name" name="name">
        </div>
        <div class="scfm-input_wrap">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="scfm-input_wrap">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject">
        </div>
        <div class="scfm-input_wrap">
            <label for="message">Your Message</label>
            <textarea name="message" id="message" rows="5" cols="5"></textarea>
        </div>
        <input type="submit" value="Submit">
    </form>
</div>