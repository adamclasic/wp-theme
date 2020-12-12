<?php get_header();
while(have_posts()) {
  the_post();
  bannerParcial();
  ?>
  


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