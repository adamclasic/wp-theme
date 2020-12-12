<?php get_header();
  bannerParcial(array(
    'title' => 'Our Events',
    'subtitle' => 'Never miss an event in the website...',
  ));
   ?>

    <div class="container container--narrow page-section">
    <?php
          
          while(have_posts()) {
            the_post();
            get_template_part('/template-parts/event')

            ?>

          <?php
          echo paginate_links();
          }
          ?>
          <p>Check out our <a href="<?php echo site_url() . '/past-events' ?>">past events</a></p>
    </div>

<?php get_footer(); ?>