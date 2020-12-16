<?php

function add_features() {
  register_nav_menu( 'headermenu', 'Primary footer Nav Menu' );

  add_theme_support('title-tag');
  add_theme_support( 'post-thumbnails' );
  add_image_size('professor-portrait', 480, 650, true);
  add_image_size('professor-landscape', 480, 325, true);
  add_image_size('banner_cover', 1500, 350, true);
}