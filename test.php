 <article id="post-<?php the_ID(); ?>" <?php post_class('three-col'); ?>>

            <!-- post title -->
            <h2 class="post-title-grid">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h2>
            <!-- /post title -->

            <!-- post thumbnail -->
            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail('grid-thumb'); // Declare pixel size you need inside the array ?>
                </a>
            <?php endif; ?>
            <!-- /post thumbnail -->

            <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

        </article>