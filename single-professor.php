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

<div class="generic-content">
  <div class="row group">
    <div class="one-third">
      <?php the_post_thumbnail('professor-portrait'); ?>
    </div>
    <div class="two-thirds">
      <?php the_content(); ?>
  </div>
</div>
  <h4>Related programs: </h4>
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