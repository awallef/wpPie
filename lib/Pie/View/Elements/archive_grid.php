<!-- Archive Element -->
<div class="container">
	
	<div class="row">
	
		<div class="span3 archiveMenu"><span class="filterText">ARCHIVES</span></div>
		<div class="span3">  <?php wp_list_categories('&title=li'); ?>  </div>
		<div class="span3"><?php wp_get_archives('type=monthly'); ?></div>
	</div>

	<div class="row archive">
		
	
	<!-- Featured Blog Posts -->	
		
		<?php foreach( $archives as $archive ){ ?>	
			<div class="span3">
					<?php 
						//echo '<span class="label">'. $cat->name. '</span>';
		
		 				if ( has_post_thumbnail($archive->ID)) {
							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($archive->ID), 'news-thumb');
							
							echo '<a href="' . get_permalink($archive->ID) . '""><img src="' . $large_image_url[0] . '" ></a>';
							echo '</a>';
							}		
					?>
					
				<h4><a href="<?php echo get_permalink($archive->ID); ?>"><?php echo $archive->post_title; ?></a></h4>
				
				<h6><?php $user_info = get_userdata(1);
     			echo  the_time('F jS Y ');	
				
				$post_categories = wp_get_post_categories( $archive->ID );
					$cats = array();
						
					foreach($post_categories as $c){
						$cat = get_category( $c );
						$cats[] = array( 'name' => $cat->name );

						}
					echo '/  ' . $cat->name. "\n";
					echo '/ by  ' . $user_info->user_login . "\n";
					?>

     			</h6>

				<p>	
					<?php echo $archive->post_content ?>

				</p>
			</div> <!-- end span3 -->	
		<?php } ?>

	</div> <!-- end row .archive -->
</div> <!-- end container -->