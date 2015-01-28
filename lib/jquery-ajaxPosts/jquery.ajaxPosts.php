<?php


  function jquery_ajax_get_posts() {

    $nonce = $_POST['nonce'];
    if ( ! wp_verify_nonce( $nonce, 'jquery_ajax_posts_nonce' ) ) die ( 'Busted!');

    $success        = true;
    $post_data      = array();
    $post_type      = $_REQUEST['postType'];
    $post_count     = $_REQUEST['postCount'];
    $post_category  = $_REQUEST['postCategory'];
    $post_offset    = $_REQUEST['postOffset'];

    // Content
    $query = new WP_Query(array(
      'post_type' 						 => $post_type,
      'posts_per_page' 				 => $post_count,
      'offset'                 => $post_offset,
      'category_name'					 => $post_category
    ));

    while( $query->have_posts() ) : $query->the_post();
      $post_thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id( $query->post->ID ), 'grid-thumb' );
      $query->post->post_thumbnail_url = $post_thumbnail_url;
      array_push( $post_data, $query->post );
      error_log('asdf');
    endwhile;
    wp_reset_postdata();

    // generate the response
    $response = json_encode( array(
      'success'     => true,
      'post_data'   => $post_data
    ));

    // response output
    header( "Content-Type: application/json" );
    echo $response;

    // IMPORTANT: don't forget to "exit"
    exit;
  }

  add_action( 'wp_ajax_nopriv_jquery_ajax_get_posts', 'jquery_ajax_get_posts' );
  add_action( 'wp_ajax_jquery_ajax_get_posts', 'jquery_ajax_get_posts' );

?>
