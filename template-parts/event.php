<div class="event-summary">
  <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
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