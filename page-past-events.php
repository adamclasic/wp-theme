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
            ?>
          <div class="event-summary">
            <a style="background-color: #aaa;" class="event-summary__date t-center" href="<?php the_permalink(); ?>">
              <span class="event-summary__month"><?php 
              $monthDate = new DateTime(get_field('event_date')); 
              echo $monthDate->format('M');
              ?></span>
              <span class="event-summary__day"><?php echo $monthDate->format('d'); ?></span>
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <p><?php echo wp_trim_words(get_the_excerpt(), 10); ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
            </div>
          </div>
          <?php
          echo paginate_links(array(
            'total' => $pastEventsQuery->max_num_pages,
          ));
          }
          ?>
    </div>

<?php get_footer(); ?>