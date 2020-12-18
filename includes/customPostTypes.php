<?php

function add_custom_posts() {

  //note Post Types
  register_post_type('note',
    array(
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-edit-page',
            'capability_type' => 'note',
            'map_meta_cap' => true,
            'labels'      => array(
                'name'          => 'note',
                'singular_name' => 'note',
                'add_new_item' => 'add new note',
                'edit_item' => 'edit note',
                'all_items' => 'all notees'
            ),
                'public'      => false,
                'has_archive' => true,
                'show_ui' => true,
                'show_in_rest' => true,
        )
    );

  //campus Post Types
  register_post_type('campus',
    array(
            'menu_icon' => 'dashicons-location-alt',
            'capability_type' => 'campus',
            'map_meta_cap' => true,
            'labels'      => array(
                'name'          => 'campus',
                'singular_name' => 'campus',
                'add_new_item' => 'add new campus',
                'edit_item' => 'edit campus',
                'all_items' => 'all campuses'
            ),
                'public'      => true,
                'has_archive' => true,
        )
    );
    
  //Events Post Types
  register_post_type('event',
  array(
          'menu_icon' => 'dashicons-calendar',
          'capability_type' => 'event',
          'map_meta_cap' => true,
          'labels'      => array(
              'name'          => 'events',
              'singular_name' => 'event',
              'add_new_item' => 'add new event',
              'edit_item' => 'edit event',
              'all_items' => 'all events'
          ),
              'public'      => true,
              'has_archive' => true,
      )
  );

  //Programs Post Types
    register_post_type('program',
    array(
            'menu_icon' => 'dashicons-awards',
            'labels'      => array(
              'name'          => 'program',
              'singular_name' => 'program',
              'add_new_item' => 'add new program',
              'edit_item' => 'edit program',
              'all_items' => 'all programs'
            ),
              'public'      => true,
              'has_archive' => true,
        )
    );

    //Professor Post Types
      register_post_type('professor',
      array(
              'supports' => array('title', 'editor', 'thumbnail'),
              'menu_icon' => 'dashicons-welcome-learn-more',
              'labels'      => array(
                'name'          => 'professor',
                'singular_name' => 'professor',
                'add_new_item' => 'add new professor',
                'edit_item' => 'edit professor',
                'all_items' => 'all professors'
              ),
                'public'      => true,
          )
      );
}