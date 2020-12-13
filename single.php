<?php get_header();
  bannerParcial(array(
    'title' => get_the_title(),
    'subtitle' => 'Just another article...',
  ));
while(have_posts()) {
  the_post();?>
  


  <div class="container container--narrow page-section">

    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog') ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to Blog Homg</a> <span class="metabox__main">Posted by <?php echo get_the_author(); ?> on <?php the_time(); ?> in <?php echo get_the_category_list(', '); ?></span></p>
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