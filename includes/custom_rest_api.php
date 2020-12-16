<?php

function custom_rest_api() {
  register_rest_route('univertisy/v1', 'search', array(
    'methods' => WP_REST_Server::READABLE,
    'callback' => 'search_resaults'
  ));
}

function search_resaults() {
  return 'hey';
}
add_action('rest_api_init ', 'custom_rest_api');
