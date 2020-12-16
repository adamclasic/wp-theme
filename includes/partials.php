<?php
function bannerParcial($args = null) {
  if(!$args['title']) {
    $args['title'] = get_the_title();
  }
  if(!$args['subtitle']) {
    $args['subtitle'] = get_field('banner_subtitile');
  }
  if(!get_field('banner_image')['sizes']['banner_cover']) {
    $args['img_url'] = get_theme_file_uri('images/ocean.jpg');
  } else {
    $args['img_url'] = get_field('banner_image')['sizes']['banner_cover'];
  }
  ?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['img_url']; ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle']; ?></p>
      </div>
    </div>  
  </div>
  <?php
}