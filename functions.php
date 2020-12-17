<?php
require 'api.php';

//partials
require get_theme_file_path('/includes/partials.php');

//styles and js files
require get_theme_file_path('/includes/add_files.php');
add_action('wp_enqueue_scripts', 'add_files');

//features and supports activatings
require get_theme_file_path('/includes/featuresAndSupports.php');
add_action('after_setup_theme', 'add_features');

//add custom post types
require get_theme_file_path('/includes/customPostTypes.php');
add_action('init', 'add_custom_posts');

//add custom queries
require get_theme_file_path('/includes/customQueries.php');
add_action('pre_get_posts', 'customDefaultEventsQuery');

//google map api
require get_theme_file_path('/includes/map_API.php');
add_filter('acf/fields/google_map/api', 'university_map_key');

//custom rest api
require get_theme_file_path('/includes/custom_rest_api.php');

//admin and users
require get_theme_file_path('/includes/adminAndUsers.php');
add_action('admin_init', 'subscriber_redirection');
add_action('wp_loaded', 'hide_wp_bar');
