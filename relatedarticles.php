<?php
  /*
    template part for related article selection that appears at the bottom of posts
  */
?>
    <aside class="related-articles">
    <p class="related-articles-button">Check out these other shops</p>
      <?php

      $posts = get_field('related_articles');

      if( $posts ): ?>
        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
          <?php setup_postdata($post); ?>
          <div class="related-articles-article">
          <h2 class="related-articles-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
          <!-- post thumbnail -->
          <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail('related-thumb'); // Declare pixel size you need inside the array ?>
            </a>
          <?php endif; ?>
          <!-- /post thumbnail -->
        </div>
        <?php endforeach; ?>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    <?php endif; ?>
    </div>
  </aside>
