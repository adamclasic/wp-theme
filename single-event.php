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
      <p><a class="metabox__blog-home-link" href="<?php echo site_url('/event') ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to all Events</a> <span class="metabox__main"><?php the_title(); ?></span></p>
    </div>

<div class="generic-content">
  <h1><?php the_title();?></h1>

  <?php the_content(); ?>
  <ul class="link-list min-list">

  <?php $relatedProgramsArray = get_field('related_programs');
  if($relatedProgramsArray) {
  foreach ($relatedProgramsArray as $program){
    ?>
    <li><a href="<?php echo $program->guid ?>"><?php echo $program->post_title; ?></a></li>
    <?php
  }
  ?>
  </ul>
  <?php
    }}
  ?>
</div>
  </div>
<?php get_footer(); ?>