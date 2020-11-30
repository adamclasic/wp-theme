<?php
function add_files() {
  wp_enqueue_style('university_styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'add_files');