<?php
function add_files() {
  wp_enqueue_script('university_script', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);

  wp_enqueue_style('university_styles', get_stylesheet_uri());
  wp_enqueue_style('university_font', "https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i");
  wp_enqueue_style('university_icons', "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
}