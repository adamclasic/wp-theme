<?php
function subscriber_redirection()
{
  if (count(wp_get_current_user()->roles) == 1 AND wp_get_current_user()->roles[0] == 'subscriber'){
    wp_redirect(site_url());
  }
}

function hide_wp_bar()
{

  if (count(wp_get_current_user()->roles) == 1 AND wp_get_current_user()->roles[0] == 'subscriber'){
    show_admin_bar(false);
  }
}