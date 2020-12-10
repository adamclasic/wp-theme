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
      <p><a class="metabox__blog-home-link" href="<?php echo site_url('/event') ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to all Events</a> <span class="metabox__main">Posted by <?php echo get_the_author(); ?> on <?php the_time(); ?> in <?php echo get_the_category_list(', '); ?></span></p>
    </div>

<div class="generic-content">
  <h1><?php the_title();?></h1>

  <?php the_content(); ?>
  
  <?php
    }
  ?>
</div>
  </div>
<?php get_footer(); ?>