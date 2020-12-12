<?php get_header();

while(have_posts()) {
  the_post();
  bannerParcial(array(
    'subtitle' => 'Just an other Awsome Event',
  ));
  ?>


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