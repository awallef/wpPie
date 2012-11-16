<!-- Team Member Element -> About Us page -->

<div class="row aboutTeam">
		<div class="span6">
		
		
 
	
		
		</div>

		<?php foreach( $posts as $post ){ ?>	
			<div class="span2">
			
				<h5><?php echo $post->post_title; ?></h5>
				
		
     			<?php
					if ( has_post_thumbnail($post->ID)) {
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'oldpostfeed-thumb');
						
						echo '<img src="' . $large_image_url[0] . '" >';
						
						echo '</a>';
						}
				?>
				<p>
					<?php echo $post->post_content; ?>
				</p>
			</div> <!-- end span4 -->
			<?php } ?>		
	</div><!-- end row -->
	
	<div class="row aboutTeambis">
		<div class="span6"></div>
		<?php foreach( $posts2 as $post2 ){ ?>	
			<div class="span2">
			
				<h5><?php echo $post2->post_title; ?></h5>
				
		
     			<?php
					if ( has_post_thumbnail($post2->ID)) {
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post2->ID), 'oldpostfeed-thumb');
						
						echo '<img src="' . $large_image_url[0] . '" >';
						
						echo '</a>';
						}
				?>
				<p>
					<?php echo $post2->post_content; ?>
				</p>
			</div> <!-- end span4 -->
			<?php } ?>		
	</div><!-- end row -->

