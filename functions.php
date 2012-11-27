<?php
include_once 'lib/Pie/Config/bootstrap.php';

add_action( 'load-index.php', 'hide_welcome_panel' );

function hide_welcome_panel() {
    $user_id = get_current_user_id();

    if ( 1 == get_user_meta( $user_id, 'show_welcome_panel', true ) )
        update_user_meta( $user_id, 'show_welcome_panel', 0 );
}


// Dynamic Footer Copyright Date


function comicpress_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}


//Posttype Portfolio

add_action( 'init', 'register_cpt_portfolio' );

function register_cpt_portfolio() {

$labels = array(
'name' => _x( 'Portfolio', 'portfolio' ),
'singular_name' => _x( 'Portfolio', 'portfolio' ),
'add_new' => _x( 'Add New', 'portfolio' ),
'add_new_item' => _x( 'Add New Entry', 'portfolio' ),
'edit_item' => _x( 'Edit Portfolio Entry', 'portfolio' ),
'new_item' => _x( 'New Portfolio Entry', 'portfolio' ),
'view_item' => _x( 'View Portfolio', 'portfolio' ),
'search_items' => _x( 'Search Portfolio Entries', 'portfolio' ),
'not_found' => _x( 'No entries found', 'portfolio' ),
'not_found_in_trash' => _x( 'No entries found in Trash', 'portfolio' ),
'parent_item_colon' => _x( 'Parent Portfolio:', 'portfolio' ),
'menu_name' => _x( 'Portfolio', 'portfolio' ),
);

$args = array(
'labels' => $labels,
'hierarchical' => false,
'description' => 'Portfolio post type generated for 3xW.',
'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),

'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'menu_position' => 5,

'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'rewrite' => true,
'capability_type' => 'post'
);

register_post_type( 'portfolio', $args );
}

//Post type Team Members

add_action( 'init', 'register_cpt_team' );

function register_cpt_team() {

$labels = array(
'name' => _x( 'Member', 'team members' ),
'singular_name' => _x( 'Member', 'team members' ),
'add_new' => _x( 'Add New Member', 'team members' ),
'add_new_item' => _x( 'Add New Member', 'team members' ),
'edit_item' => _x( 'Edit Member', 'team members' ),
'new_item' => _x( 'New Member', 'team members' ),
'view_item' => _x( 'View Members', 'team members' ),
'search_items' => _x( 'Search Member Entries', 'team members' ),
'not_found' => _x( 'No entries found', 'team members' ),
'not_found_in_trash' => _x( 'No entries found in Trash', 'team members' ),
'parent_item_colon' => _x( 'Parent member', 'team members' ),
'menu_name' => _x( 'About Us', 'team members' ),
);

$args = array(
'labels' => $labels,
'hierarchical' => false,
'description' => 'Team Member post type generated for the About Us page.',
'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),

'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'menu_position' => 5,

'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'rewrite' => true,
'capability_type' => 'post'
);

register_post_type( 'teammembers', $args );
}
		    
    
    //Excerpt "More" after text
    
function wppie_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= wppie_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'wppie_custom_excerpt_more' );   




     //TEMPLATE POSTS

function post_template_meta_box($post) {
  if ( 'post' == $post->post_type && 0 != count( get_post_templates() ) ) {
    $template = get_post_meta($post->ID,'_post_template',true);
    ?>
<label class="screen-reader-text" for="post_template"><?php _e('Post Template') ?></label><select name="post_template" id="post_template">
<option value='default'><?php _e('Default Template'); ?></option>
<?php post_template_dropdown($template); ?>
</select>
<?php
  } ?>
<?php
}

add_action('add_meta_boxes','add_post_template_metabox');
function add_post_template_metabox() {
    add_meta_box('postparentdiv', __('Post Template'), 'post_template_meta_box', 'post', 'side', 'core');
}

function get_post_templates() {
  $themes = wp_get_themes();
  $theme = wp_get_theme();
  $templates = $theme->{'Template Files'};
  $post_templates = array();

  if ( is_array( $templates ) ) {
    $base = array( trailingslashit(get_template_directory()), trailingslashit(get_stylesheet_directory()) );

    foreach ( $templates as $template ) {
      $basename = str_replace($base, '', $template);
      if ($basename != 'functions.php') {
        // don't allow template files in subdirectories
        if ( false !== strpos($basename, '/') )
          continue;

        $template_data = implode( '', file( $template ));

        $name = '';
        if ( preg_match( '|Post Template:(.*)$|mi', $template_data, $name ) )
          $name = _cleanup_header_comment($name[1]);

        if ( !empty( $name ) ) {
          $post_templates[trim( $name )] = $basename;
        }
      }
    }
  }

  return $post_templates;
}

function post_template_dropdown( $default = '' ) {
  $templates = get_post_templates();
  ksort( $templates );
  foreach (array_keys( $templates ) as $template )
    : if ( $default == $templates[$template] )
      $selected = " selected='selected'";
    else
      $selected = '';
  echo "\n\t<option value='".$templates[$template]."' $selected>$template</option>";
  endforeach;
}

add_action('save_post','save_post_template',10,2);
function save_post_template($post_id,$post) {
  if ($post->post_type=='post' && !empty($_POST['post_template']))
    update_post_meta($post->ID,'_post_template',$_POST['post_template']);
}

add_filter('single_template','get_post_template_for_template_loader');
function get_post_template_for_template_loader($template) {
  global $wp_query;
  $post = $wp_query->get_queried_object();
  if ($post) {
    $post_template = get_post_meta($post->ID,'_post_template',true);
    if (!empty($post_template) && $post_template!='default')
      $template = get_stylesheet_directory() . "/{$post_template}";
  }
  return $template;
}


/* THUMBNAILS */


add_theme_support( 'post-thumbnails' );

// Thumbnails normal posts.

if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(
            array(
                'label' => '2nd Thumbnail',
                'id' => 'secondary-image',
                'post_type' => 'post'
            )
        );
        
        new MultiPostThumbnails(
            array(
                'label' => '3rd Thumbnail',
                'id' => 'third-image',
                'post_type' => 'post'
            )
        );
        
        new MultiPostThumbnails(
            array(
                'label' => '4th Thumbnail',
                'id' => 'fourth-image',
                'post_type' => 'post'
            )
        );

    }
   
// Thumbnails custom post types.    
    
    
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => '2nd Thumbnail',
            'id' => 'secondary-image',
            'post_type' => 'portfolio'
        )
    );
    
    new MultiPostThumbnails(
        array(
            'label' => '3rd Thumbnail',
            'id' => 'third-image',
            'post_type' => 'portfolio'
        )
    );
    
     new MultiPostThumbnails(
        array(
            'label' => '4th Thumbnail',
            'id' => 'fourth-image',
            'post_type' => 'portfolio'
        )
    );
 

}


/* Thumbnail Sizes */

add_theme_support( 'menus' );

add_post_type_support('page', 'excerpt');

add_post_type_support('post', 'excerpt');

add_image_size('classic-thumb', 120, 120, true); // Classic crop

add_image_size('news-thumb', 770, 250, true); // News thumbnail crop

add_image_size('arch-thumb', 710, 340, true); // Archive thumbnail crop

add_image_size('featured-thumb', 370, 250, true); // Crop set for thumbnails  in the featured blog posts Area

add_image_size('project-thumb', 370, 170, true); // Crop set for thumbnails  in the featured projects Area

add_image_size('oldpostfeed-thumb', 270, 150, true); // Crop set for thumbnails  in the "older posts" Area

add_image_size( 'fullpost-thumb', 590, 9999, true ); // Unlimited Height Mode
?>