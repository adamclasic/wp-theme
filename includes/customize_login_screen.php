<?php
function customize_login_screen()
{
  return site_url('/');
}

function add_login_style()
{
  wp_enqueue_style('university_styles', get_stylesheet_uri());

}
