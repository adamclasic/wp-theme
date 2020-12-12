<?php get_header();
  bannerParcial(array(
    'title' => 'Our Programs',
    'subtitle' => 'See classes in the website...',
  ));
   ?>


    </div>
    <div class="container container--narrow page-section">
      <ul class="link-list min-list">
    <?php
          while(have_posts()) {
            the_post();
            ?>
          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          <?php
          echo paginate_links();
          }
          ?>
          </ul>
    </div>

<?php get_footer(); ?>