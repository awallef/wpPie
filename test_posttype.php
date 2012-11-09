<!-- STEP 1 --->

add_action('init', 'about_page');

function about_page() {
  $labels = array(
    'name' => _x('About Us', 'post type general name),
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
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )
  ); 
  register_post_type('Aboutus', $args);
}


<!-- STEP 2 --->



register_taxonomy("Team", array("aboutus"), array("hierarchical" =&gt; true, "label" =&gt; "Team", "singular_label" =&gt; "Team", "rewrite" =&gt; true));


<!-- STEP 3 --->



add_action("admin_init", "admin_init");   

function admin_init(){ 
	add_meta_box("year_completed-meta", "Year Completed", "year_completed", "portfolio", "side", "low"); 
	add_meta_box("credits_meta", "Design &amp; Build Credits", "credits_meta", "portfolio", "normal", "low");
	 }   
	 
function year_completed(){ 
	global $post; 
	$custom = get_post_custom($post-&gt;ID); 
	$year_completed = $custom["year_completed"][0];
	?&gt; 
	&lt;label&gt;Year:&lt;/label&gt; 
	&lt;input name="year_completed" value="&lt;?php echo $year_completed; ?&gt;" /&gt; 
	&lt;?php 
	}   
	
	function credits_meta() { 
		global $post; 
		$custom = get_post_custom($post-&gt;ID); 
		$designers = $custom["designers"][0]; 
		$developers = $custom["developers"][0]; 
		$producers = $custom["producers"][0]; 
		?&gt; 
		&lt;p&gt;&lt;label&gt;Designed By:&lt;/label&gt;&lt;br /&gt; 
		&lt;textarea cols="50" rows="5" name="designers"&gt;&lt;?php echo $designers; ?&gt;&lt;/textarea&gt;
		&lt;/p&gt; &lt;p&gt;&lt;label&gt;Built By:&lt;/label&gt;&lt;br /&gt; 
		&lt;textarea cols="50" rows="5" name="developers"&gt;&lt;?php echo $developers; ?&gt;&lt;/textarea&gt;
		&lt;/p&gt; &lt;p&gt;&lt;label&gt;Produced By:&lt;/label&gt;&lt;br /&gt; 
		&lt;textarea cols="50" rows="5" name="producers"&gt;&lt;?php echo $producers; ?&gt;&lt;/textarea&gt;&lt;/p&gt; 
		&lt;?php 
		}
