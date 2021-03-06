<?php
/**
 * Author: Todd Motto | @toddmotto
 * URL: html5blank.com | @html5blank
 * Custom functions, support, custom post types and more.
 */

require_once "modules/is-debug.php";
require_once( 'lib/jquery-ajaxPosts/jquery.ajaxPosts.php' );
function add_to_init() {

}
add_action('init', 'add_to_init');

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    add_image_size('featured-thumb', 420, 250, true);
    add_image_size('small-hotel-thumb', 103, 46, true);
    add_image_size('medium-hotel-thumb', 254, 114, true);
    add_image_size('stay-thumb', 248, 130, true);
    add_image_size('related-thumb', 192, 112, true);
    add_image_size('grid-thumb', 265, 165, true);
    add_image_size('slider', 995, 435, true);
    add_image_size('grid-half', 485, 302, true);
    add_image_size('grid-quarter', 353, 220, true);

    add_image_size('featured-thumb-new', 485, 289, true);
    add_image_size('editorial-thumb-new', 382, 204, true);


    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
    'default-image'          => get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'            => false,
    'default-text-color'     => '000',
    'width'                  => 1000,
    'height'                 => 198,
    'random-default'         => false,
    'wp-head-callback'       => $wphead_cb,
    'admin-head-callback'    => $adminhead_cb,
    'admin-preview-callback' => $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

function custom_excerpt_length( $length ) {
  return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// HTML5 Blank navigation
function html5blank_nav()
{
    wp_nav_menu(
      array(
        'theme_location'  => 'header-menu',
        //'menu'            => '',
        //'container'       => 'div',
        //'container_class' => 'menu-{menu slug}-container',
        //'container_id'    => 'main-nav',
        'menu_class'      => 'menu nav-header',
        //'menu_id'         => 'menu-{menu slug}',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        //'before'          => '',
        //'after'           => '',
        //'link_before'     => '',
        //'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        //'walker'          => ''
      )
    );
}

function roomandservice_enqueue_scripts() {
  $stylesheet_dir = get_stylesheet_directory_uri();
  $protocol='http:'; // discover the correct protocol to use
  if(!empty($_SERVER['HTTPS'])) $protocol='https:';

  // jQuery AJAX Posts
  wp_enqueue_script( 'jquery-ajax-posts', "$stylesheet_dir/lib/jquery-ajaxPosts/jquery.ajaxPosts.js", array('jquery') );
  wp_localize_script('jquery-ajax-posts', 'jquery_ajax_posts', array(
    'ajaxurl' => admin_url('admin-ajax.php',$protocol),
    'nonce' => wp_create_nonce('jquery_ajax_posts_nonce')
  ));
}
add_action( 'wp_enqueue_scripts', 'roomandservice_enqueue_scripts' );

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

            // Conditionizr
            wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0');

            // Modernizr
            wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr/modernizr.js', array(), '2.8.3');

            // Custom scripts
            wp_register_script(
                'html5blankscripts',
                get_template_directory_uri() . '/js/scripts.js',
                array(
                    'conditionizr',
                    'modernizr',
                    'jquery'),
                '1.0.0');

            // Enqueue Scripts
            wp_enqueue_script('html5blankscripts');
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        // Conditional script(s)
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0');
        wp_enqueue_script('scriptname');
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    if (HTML5_DEBUG) {
        // normalize-css
        wp_register_style('normalize', get_template_directory_uri() . '/bower_components/normalize.css/normalize.css', array(), '3.0.1');

        // Custom CSS
        wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array('normalize'), '1.0');

        // Register CSS
        wp_enqueue_style('html5blank');
    } else {
        // Custom CSS
        wp_register_style('html5blankcssmin', get_template_directory_uri() . '/style.css', array(), '1.0');
        // Register CSS
        wp_enqueue_style('html5blankcssmin');
    }
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'footer-menu' => __('Footer Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove the width and height attributes from inserted images
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// Truncate content based on character count
function limit_character_count( $text, $maxchar ) {
  if ( strlen( $text ) >= $maxchar ) {
    return substr( $text, 0, $maxchar ) . "...";
  } else {
    return $text;
  }
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p class="excerpt">' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php }

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_hotel'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
add_filter('image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

/*Custom Hotel post type

fields added:
-hotel_info
	- _url
	- _phone
- text tabs:
	- _about
	- _why
	- _amenities
*/

//add_filter('query_vars', 'add_query_vars');
function add_query_vars($aVars) {
  //$aVars[] = "cats"; // represents the name of the product category as shown in the URL
  //return $aVars;
}

//add_filter('rewrite_rules_array', 'add_rewrite_rules');
function add_rewrite_rules($aRules) {
  //  $aNewRules = array('hotel/([\b\starwood\b]+)/?$' => 'index.php?post_type=hotel&cats=$matches[1]');
  // $aNewRules6 = array('hotel/(\bbig-island/?)$' => 'index.php?post_type=hotel&cats=$matches[1]');
  // $aNewRules5 = array('hotel/(\bmaui/?)$' => 'index.php?post_type=hotel&cats=$matches[1]');
  // $aNewRules4 = array('hotel/(\bkauai/?)$' => 'index.php?post_type=hotel&cats=$matches[1]');
  // $aNewRules3 = array('hotel/(\boahu/?)$' => 'index.php?post_type=hotel&cats=$matches[1]');
  // $aNewRules2 = array('hotel/(\bstarwood/?)$' => 'index.php?post_type=hotel&cats=$matches[1]');
  // $aNewRules = array('hotel/^((?!starwood/?).)*$' => 'index.php?post_type=hotel&pagename=$matches[1]');
  //$aNewRules2 = array('hotel/^((?!starwood).)*/?$' => 'index.php?post_type=hotel&pagename=$matches[1]');
  //$aNewRules = array('hotel/([^/]+)/([^/]+)/?$' => 'index.php?post_type=hotel&cats=$matches[1]&pagename=$matches[1]');
  //$aRules = $aNewRules + $aNewRules2 + $aNewRules3 + $aNewRules4 + $aNewRules5 + $aNewRules6 + $aRules;
  //return $aRules;
}

function create_post_type_hotel()
{
    register_taxonomy_for_object_type('category', 'hotel'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'hotel');
    register_post_type('hotel', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Hotels', 'hotel'), // Rename these to suit
            'singular_name' => __('Hotels', 'hotel'),
            'add_new' => __('Add New', 'hotel'),
            'add_new_item' => __('Add New Hotel post', 'hotel'),
            'edit' => __('Edit', 'hotel'),
            'edit_item' => __('Edit Hotel post', 'hotel'),
            'new_item' => __('New Hotel post', 'hotel'),
            'view' => __('View Hotel posts', 'hotel'),
            'view_item' => __('View Hotel post', 'hotel'),
            'search_items' => __('Search Hotel posts', 'hotel'),
            'not_found' => __('No Hotel posts found', 'hotel'),
            'not_found_in_trash' => __('No Hotel posts found in Trash', 'hotel')
        ),
        // 'rewrite' =>  array(
        //   'slug' => '',
        // ),
        'publicly_queryable' => true,
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'custom-fields'
        ),
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ),
      	'menu_position' => 4,
        'register_meta_box_cb' => 'add_events_metaboxes'
    ));
}

function add_events_metaboxes() {
	add_meta_box('hotel_info', 'Hotel Contact Info', 'hotel_info', 'hotel', 'side', 'default');
	add_meta_box('hotel_about', 'Hotel Text Tabs', 'hotel_tab', 'hotel', 'normal', 'default');
}

function hotel_info() {
    global $post;

    echo '<input type="hidden" name="hotelinfometa_noncename" id="hotelinfometa_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

    $hotelurl = get_post_meta($post->ID, '_url', true);
	$hotelphone = get_post_meta($post->ID, '_phone', true);

	echo '<p>Hotel home page URL:</p>';
	echo '<input type="text" name="_url" value="' . $hotelurl  . '" class="widefat" />';
	echo '<p>Hotel Phone Number:</p>';
	echo '<input type="text" name="_phone" value="' . $hotelphone  . '" class="widefat" />';

}

function hotel_tab() {
    global $post;

    echo '<input type="hidden" name="hoteltabmeta_noncename" id="hoteltabmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

    $hotelabout = get_post_meta($post->ID, '_about', true);
    $hotelwhy = get_post_meta($post->ID, '_why', true);
    $hotelamenities = get_post_meta($post->ID, '_amenities', true);


    echo '<p style="font-style: italic; font-weight: bold;">Return 2x for new paragraph, 1x for line break</p>';
	echo '<p>"About" tab:</p>';
	wp_editor( $hotelabout, 'hotelabout', array(
        'wpautop'       => true,
        'media_buttons' => false,
        'textarea_name' => '_about',
        'textarea_rows' => 10,
        'teeny'         => true
    ) );
	echo '<p>"Why we love this place" tab:</p>';
	wp_editor( $hotelwhy, 'hotelwhy', array(
        'wpautop'       => true,
        'media_buttons' => false,
        'textarea_name' => '_why',
        'textarea_rows' => 10,
        'teeny'         => true
    ) );
	echo '<p>"Amenities" tab:</p>';
	wp_editor( $hotelamenities, 'hotelamenities', array(
        'wpautop'       => true,
        'media_buttons' => false,
        'textarea_name' => '_amenities',
        'textarea_rows' => 10,
        'teeny'         => true
    ) );
}

// Save the Metabox Data

function hotel_save_meta($post_id, $post) {

    // checking nonce
    if ( !wp_verify_nonce( $_POST['hotelinfometa_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }
    if ( !wp_verify_nonce( $_POST['hoteltabmeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }

    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    $hotels_meta['_url'] = $_POST['_url'];
    $hotels_meta['_phone'] = $_POST['_phone'];
	$hotels_meta['_about'] = $_POST['_about'];
	$hotels_meta['_why'] = $_POST['_why'];
	$hotels_meta['_amenities'] = $_POST['_amenities'];


    foreach ($hotels_meta as $key => $value) {
        if( $post->post_type == 'revision' ) return;
        $value = implode(',', (array)$value);
        if(get_post_meta($post->ID, $key, FALSE)) {
            update_post_meta($post->ID, $key, $value);
        } else {
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }

}

add_action('save_post', 'hotel_save_meta', 1, 2); // save the custom fields



/*------------------------------------*\
    ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

add_filter('pre_get_posts', 'query_post_type_hotel');
function query_post_type_hotel($query) {
    if ( !is_admin() && $query->is_main_query() ) {
        if(is_category() || is_tag()) {
            $post_type = get_query_var('post_type');
            if($post_type){
                $post_type = $post_type;
            }
            else{
                $post_type = array('post','hotel'); // replace cpt to your custom post type
            }
            $query->set('post_type',$post_type);
            return $query;
        }
    }
}


?>
