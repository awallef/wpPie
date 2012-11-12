	<!-- Latest Projects -->
	
<div id="resume">
	
	<div class="secondaryTitle"><h5>LATEST PROJECTS</h5></div>
	<div class="row">
	
		<?php foreach( $posts3 as $post3 ){ ?>	
			<div class="span4">
			
				<h5><a href="<?php echo get_permalink($post3->ID); ?>"><?php echo $post3->post_title; ?></a></h5>
				
		
     			<?php
					if ( has_post_thumbnail()) {
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post3->ID), 'project-thumb');
						
						echo '<a href="' . get_permalink($post3->ID) . '""><img src="' . $large_image_url[0] . '" ></a>';
						
						echo '</a>';
						}
				?>
				<p>
					<?php echo $post3->post_content; ?>
				</p>
			</div> <!-- end span4 -->
			<?php } ?>		
		</div><!-- end row -->
</div><!-- end resume -->