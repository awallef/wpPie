<!-- Older Blog Posts -->
		
	<div id="resume">
	<div class="secondaryTitle"><h5>OLDER POSTS</h5></div>
		<div class="row">
		
		
		<?php foreach( $posts2 as $post2 ){ ?>	
			<div class="span2">
			
				<h5><a href="<?php echo get_permalink($post2->ID); ?>"><?php echo $post2->post_title; ?></a></h5>
				
		
     			<?php
					if ( has_post_thumbnail()) {
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post2->ID), 'oldpostfeed-thumb');
						
						echo '<a href="' . get_permalink($post2->ID) . '""><img src="' . $large_image_url[0] . '" ></a>';
						
						echo '</a>';
						}
				?>
				<p>
					<?php echo $post2->post_excerpt; ?>
				</p>
			</div> <!-- end span2 -->
			<?php } ?>		
		</div><!-- end row -->
	</div><!-- end resume -->
