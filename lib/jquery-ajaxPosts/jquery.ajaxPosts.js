jQuery(document).ready(function( $ ) {

  /**
  *  jQuery AJAX Posts
  *  CRUD access to WordPress posts.
  *  @author Justin Hedani
  */

  /**
  *  GET WordPress posts
  *
  *  @param post_type  string
  *  @param post_count int
  *  @param post_category string
  */

  function jquery_ajax_get_posts( post_type, post_count, post_category, post_offset ) {
    return jQuery.post(jquery_ajax_posts.ajaxurl, {
      action:       "jquery_ajax_get_posts",
      nonce:        jquery_ajax_posts.nonce,
      postType:     post_type,
      postCount:    post_count,
      postCategory: post_category,
      postOffset:   post_offset
    });
  }

  $('.jquery-ajax-get-posts').on('click', function() {

    var post_type     = $(this).data('post-type');
    var post_count    = $(this).data('post-count');
    var post_category = $(this).data('post-category');
    var post_offset   = $(this).attr('data-post-offset');



    var post_trigger  = $(this);
    var total_post_count = $(this).attr('data-total-post-count');
    var current_post_category = post_trigger.data('post-category');

    // @todo spinner
    // @todo disable button
    // @todo scroll page

    jquery_ajax_get_posts( post_type, post_count, post_category, post_offset ).done(function( response ) {
      var postData = response.post_data;

      // Clear current posts
      if ( post_trigger.hasClass( 'jquery-ajax-clear-posts') ) {
        $('.jquery-ajax-post-container').empty();
      }

      if ( post_trigger.hasClass('jquery-ajax-update-load-more') ) {

        // Replace new load more with current category
        var newcategory = post_trigger.data('post-category');
        $('body').find('.jquery-ajax-get-posts-button').attr('data-post-category', newcategory);

        // Update total post count
        $('body').find('.jquery-ajax-get-posts-button').attr('data-total-post-count', total_post_count);
      }

      for ( var i = 0; i < postData.length; i++ ) {
        var output = "";
        var post = postData[i];

        output += '<article id="post-'+ post.ID +'" class="three-col">';
        output += ' <h2 class="post-title-grid">';

        var ellipsis = "...";
        if ( post.post_title.length < 22 ) {
          ellipsis = "";
        }

        output += ' <a href="'+ post.guid +'" title="'+ post.post_title +'">'+ post.post_title.substring(0, 22) + ellipsis +'</a>';
        output += '</h2>';
        if ( post.post_thumbnail_url[0] ) {
        output += '<a href="'+post.guid+'" title="'+post.post_title+'">';
        output += '<img class="attachment-grid-thumb wp-post-image" src="'+post.post_thumbnail_url[0]+'" />';
        output += '</a>';
        }
        output += '<p class="excerpt">'+post.post_excerpt.substring(0, 100)+'...</p>';
        output += '<a class="editorial-more" href="'+post.guid+'">+ Read More</a>';

        $('body').find('.jquery-ajax-post-container').append(output);
        // $('body').find('#post-' + post.ID ).removeClass('ajax-hidden').addClass('ajax-visible');
      }

      // Count the total number of posts/articles on page
      var total_article_count = $('.jquery-ajax-post-container article').length;

      // Update total offset as more appear
      post_trigger.attr('data-post-offset', total_article_count);

      // Hide more posts
      if( total_article_count >= total_post_count ) {
        //if ( ! post_trigger.hasClass('jquery-ajax-clear-posts') ) {
          $('.jquery-ajax-get-posts-button').hide();
        //}
      }
    });

  });

});


// <!-- article -->
// <article id="post-<?php the_ID(); ?>" <?php post_class('three-col'); ?>>
//
// <!-- post title -->
// <h2 class="post-title-grid">
// <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo limit_character_count( get_the_title(), 22); ?></a>
// </h2>
// <!-- /post title -->
//
// <!-- post thumbnail -->
// <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
// <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
// <?php the_post_thumbnail('grid-thumb'); // Declare pixel size you need inside the array ?>
// </a>
// <?php endif; ?>
// <!-- /post thumbnail -->
//
// <?php //html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
// <p class="excerpt"><?php  echo limit_character_count( get_the_excerpt(), 100); ?></p>
//
// <a class="editorial-more" href="http://192.168.20.50/backpacking-haleakala/">+ Read More</a>
//
// </article>
// <!-- /article -->
