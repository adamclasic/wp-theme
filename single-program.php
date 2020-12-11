<?php get_header();
while(have_posts()) {
  the_post();?>
  
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg'); ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p>DONT FORGET TO CHNAGE THIS.</p>
      </div>
    </div>  
  </div>

  <div class="container container--narrow page-section">

    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo site_url('/program') ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to All programs</a> <span class="metabox__main"><?php the_title(); ?></span></p>
    </div>

<div class="generic-content">
  <h1><?php the_title();?></h1>

  <?php the_content(); ?>
  
  <?php
    }
  ?>

<?php
          $relationalQueryEvents = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'order_by' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
              array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => Date('Ymd')
              ),
              array(
                'key' => 'related_programs',
                'compare' => 'LIKE',
                'value' => '"' . get_the_id() . '"',
              )
            ), 
                    ));
                    if ($relationalQueryEvents->have_posts()) {
          while($relationalQueryEvents->have_posts()) {
            $relationalQueryEvents->the_post();
            ?>
              <h4>Related Up-comming Events:</h4>
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
          <?php }} 
          wp_reset_postdata();
          ?>
                        <h4>Related professors:</h4>
                        <ul class="link-list min-list">

<?php
          $relationalQueryProfessors = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'professor',
            'order_by' => 'title',
            'order' => 'ASC',
            'meta_query' => array(
              array(
                'key' => 'related_programs',
                'compare' => 'LIKE',
                'value' => '"' . get_the_id() . '"',
              )
            ), 
                    ));
                     if ($relationalQueryProfessors->have_posts()) {
                      while($relationalQueryProfessors->have_posts()) {
                        $relationalQueryProfessors->the_post();
                        ?>

              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

          <?php }} 
          wp_reset_postdata();
          ?>
</div>
  </div>
<?php get_footer(); ?>