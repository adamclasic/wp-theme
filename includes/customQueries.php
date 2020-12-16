<?php
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
