<!-- Home View -->

<!-- Banner -->
<?php echo $this->element('banner'); ?> 
<div class="container">
	
	<div class="row lastPosts">
		
	
	<!-- Featured Blog Posts -->	
		
		<?php foreach( $posts as $post ){ ?>	
			<div class="span4">
					<?php 
						//echo '<span class="label">'. $cat->name. '</span>';
		
		 				if ( has_post_thumbnail()) {
							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'featured-thumb');
							
							echo '<a href="' . get_permalink($post->ID) . '""><img src="' . $large_image_url[0] . '" ></a>';
							echo '</a>';
							}		
					?>
					
				<h4><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h4>
				
				<h6><?php $user_info = get_userdata(1);
     			echo ' ' . $post->post_date. "\n";
				
				$post_categories = wp_get_post_categories( $post->ID );
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
					
					<?php echo $post->post_content; ?>
				</p>
			</div> <!-- end span4 -->		
		<?php } ?>
	</div> <!-- end row .lastPosts -->
	
	
	<!-- Accroche -->
	
	<div id="accrocheArea">
		<div class="row">
			<div class="span1"></div>
			<div class="span8 accrocheContent">
			<h1> &ldquo; We creat simple, beautiful and responsive design for each of our <a href="#">products</a>”. </h1>
			</div>
			<div class="span2"></div>
		
		</div>
	</div>

</div> <!-- end container -->
<!-- Footer -->
<?php echo $this->element('footer'); ?>