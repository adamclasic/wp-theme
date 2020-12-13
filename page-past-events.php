<?php get_header();
  bannerParcial(array(
    'title' => 'Passed away events',
    'subtitle' => 'subscribe to never miss an event',
  ));
  ?>

    <div class="container container--narrow page-section">
    <?php
          $pastEventsQuery = new WP_Query(array(
            'paged' => get_query_var('paged', 1),
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'order_by' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
              array(
                'key' => 'event_date',
                'compare' => '<',
                'value' => Date('Ymd')
              ),
            ),
          ));
          while($pastEventsQuery->have_posts()) {
            $pastEventsQuery->the_post();
            get_template_part('/template-parts/event');
            ?>

          <?php
          echo paginate_links(array(
            'total' => $pastEventsQuery->max_num_pages,
          ));
          }
          ?>
    </div>

<?php get_footer(); ?>