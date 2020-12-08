<?php get_header(); ?>

<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/library-hero.jpg') ?>);"></div>
      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
        <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
      </div>
    </div>
    <div class="container container--narrow page-section">
    <?php 
      while (have_posts()) {
        the_post();
        ?>
        <div class="post-item">
        <h1 class="headline headline--medium headline--post-title"><a  href="<?php the_permalink(); ?>"><?php the_title() ?></a></h1>
          <div class="metabox">
            <p>posted by <?php the_author() ;?> on <?php the_date();?> in <?php echo get_the_category_list(', '); ?></p>
          </div>
          <div class="generic-content">
            <?php the_excerpt(); ?>
          </div>
          <p><a href="<?php the_permalink();?>" class="btn btn--blue">Read More</a></p>
        </div>
     <?php
     echo paginate_links();
     }
    ?>
    </div>

<?php get_footer(); ?>