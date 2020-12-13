<?php
require 'api.php';
//partials
echo $apiKey;
function bannerParcial($args = null) {
  if(!$args['title']) {
    $args['title'] = get_the_title();
  }
  if(!$args['subtitle']) {
    $args['subtitle'] = get_field('banner_subtitile');
  }
  if(!get_field('banner_image')['sizes']['banner_cover']) {
    $args['img_url'] = get_theme_file_uri('images/ocean.jpg');
  } else {
    $args['img_url'] = get_field('banner_image')['sizes']['banner_cover'];
  }
  ?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['img_url']; ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle']; ?></p>
      </div>
    </div>  
  </div>
  <?php
}





function add_files() {
  wp_enqueue_script('university_script', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);

  wp_enqueue_style('university_styles', get_stylesheet_uri());
  wp_enqueue_style('university_font', "https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i");
  wp_enqueue_style('university_icons', "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
}

add_action('wp_enqueue_scripts', 'add_files');


function add_features() {
  register_nav_menu( 'headermenu', 'Primary footer Nav Menu' );

  add_theme_support('title-tag');
  add_theme_support( 'post-thumbnails' );
  add_image_size('professor-portrait', 480, 650, true);
  add_image_size('professor-landscape', 480, 325, true);
  add_image_size('banner_cover', 1500, 350, true);
}
add_action('after_setup_theme', 'add_features');

function add_custom_posts() {

  //campus Post Types
  register_post_type('campus',
    array(
            'menu_icon' => 'dashicons-location-alt',
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

add_action('init', 'add_custom_posts');

function customDefaultEventsQuery($query)
{
  //custom archive-program URL query
  if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
    $query->set('posts_per_page', -1);
    $query->set('order_by', 'title');
    $query->set('order', 'DESC');

  }

  //custom archive-event URL query
  if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
    $query->set('meta_key', 'event_date');
    $query->set('order_by', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
        array(
          'key' => 'event_date',
          'compare' => '>=',
          'value' => Date('Ymd')
        )
      )
    );
  }
}

add_action('pre_get_posts', 'customDefaultEventsQuery');
