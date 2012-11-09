<?php
include_once 'lib/Pie/Config/bootstrap.php';

add_action('init', 'about_page');

function about_page() {
  $labels = array(
    'name' => _x('About Us', 'post type general name'),
    'singular_name' => _x('About us item', 'post type singular name'),
    'add_new' => _x('Add New', 'About us item'),
    'add_new_item' => __('Add New About us item'),
    'edit_item' => __('Edit an About us item'),
    'new_item' => __('New About us item'),
    'all_items' => __('All About us items'),
    'view_item' => __('View About us item'),
    'search_items' => __('Search About us items'),
    'not_found' =>  __('Nothing found'),
    'not_found_in_trash' => __('Nothing found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => __('About Us')

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => _x( 'book', 'URL slug' ) ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields')
  ); 
  register_post_type('Aboutus', $args);
}


register_taxonomy('Team', array('Aboutus'), 
								array(
								'hierarchical' => true, 
								'label' => 'Team', 
								'singular_label' => 'Team', 
								'Team', 'rewrite' => true
								));


// Contenu à partir d'ici à adapter au theme.

add_action("admin_init", "admin_init");   

function admin_init(){ 
	add_meta_box("year_completed-meta", "Year Completed", "year_completed", "portfolio", "side", "low"); 
	add_meta_box("credits_meta", "Design &amp; Build Credits", "credits_meta", "portfolio", "normal", "low");
	 }   
	 
function year_completed(){ 
	global $post; 
	$custom = get_post_custom($post->ID); 
	$year_completed = $custom["year_completed"][0];
	?> 
	<label>Year</label> 
	<input name="year_completed" value="<?php echo $year_completed; ?>" /> 
	<?php 
	}   
	
	function credits_meta() { 
		global $post; 
		$custom = get_post_custom($post->ID); 
		$designers = $custom["designers"][0]; 
		$developers = $custom["developers"][0]; 
		?> 
		<p>
			<label>Designed By</label><br /> 
			<textarea cols="50" rows="5" name="designers"><?php echo $designers; ?></textarea>
		</p> 
		<p>
			<label>Built By</label><br /> 
			<textarea cols="50" rows="5" name="developers"><?php echo $developers; ?></textarea>
		</p>
		<?php 
		}			
?>
<?php
		
add_action("manage_posts_custom_column",  "portfolio_custom_columns");
add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");
 
function portfolio_edit_columns($columns){
  $columns = array(
    "cb" => "<input type='checkbox' />;",
    "title" => "Portfolio Title",
    "description" => "Description",
    "year" => "Year Completed",
    "skills" => "Skills",
  );
 
  return $columns;
}
function portfolio_custom_columns($column){
  global $post;
 
  switch ($column) {
    case "description":
      the_excerpt();
      break;
    case "year":
      $custom = get_post_custom();
      echo $custom["year_completed"][0];
      break;
    case "skills":
      echo get_the_term_list($post->ID, 'Skills', '', ', ','');
      break;
  }
}
 		

add_theme_support( 'post-thumbnails' );

// THIS LINKS THE THUMBNAIL TO THE POST PERMALINK

	add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );
	
	function my_post_image_html( $html, $post_id, $post_image_id ) {

	$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';

	return $html;
}

add_image_size('featuredBlogPostsImg', 370, 250, true);

?>