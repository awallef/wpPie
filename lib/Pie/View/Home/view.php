<!-- Home View -->

<div class="container">
	
	<!-- Banner -->
	<?php echo $this->element('banner'); ?> 
	<div class="secondaryTitle"><h5>FEATURED BLOG POSTS</h5></div>
	<div class="row lastPosts">
		
	
	<!-- Featured Blog Posts -->	
		
		<?php foreach( $posts as $post ){ ?>	
			<div class="span4">
				
				<h2><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h2>
				
				<h6><?php $user_info = get_userdata(1);
     			echo ' ' . $post->post_date. "\n";
				
				$post_categories = wp_get_post_categories( $post->ID );
					$cats = array();
						
					foreach($post_categories as $c){
						$cat = get_category( $c );
						$cats[] = array( 'name' => $cat->name );

						}
					echo ' ' . $cat->name. "\n";
					
     				echo '/ ' . $user_info->user_login . "\n";
     				if ( has_post_thumbnail()) {
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'featuredBlogPostsImg');
						
						echo '<a href="' . $large_image_url[0] . '""><img src="' . $large_image_url[0] . '" ></a>';
						
						echo '</a>';
						}
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
			<h1>We creat simple, beautiful and responsive design for each of our <a href="#">products</a>. </h1>
			</div>
			<div class="span2"></div>
		
		</div>
	</div>
	
	<?php echo $this->element('latestprojects'); ?> 


	<?php echo $this->element('oldposts'); ?> 

	
		<!-- Footer -->
	<h6><?php echo $this->element('footer'); ?> </h6>
</div> <!-- end container -->

