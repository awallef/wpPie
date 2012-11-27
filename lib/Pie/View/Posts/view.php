<!-- Posts View -->
	<!-- Banner -->
	<?php echo $this->element('banner'); ?> 
<div class="container">

	<div class="row">
			<div class="span1 offset1 navPrev">
				<?php previous_post_link('%link', '<'); ?>
			</div>
					<div class="span8">
			
			<?php 
				$id = get_the_id();
				$post = get_post($id);
				$title = $post->post_title;?>
				<h1 class="blueText"><?php echo $title;?></h1>
				<h6><?php $user_info = get_userdata(1);
     				echo 'posted by: ' . $user_info->user_login . "\n";
     		?></h6>
				<?php
					echo $post->post_content; 
				?>
				<div class="span8 postImages">
					<?php 
						if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(the_post_thumbnail('large'), 'first-image'); endif;	 
						if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(),'secondary-image'); endif;
						if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'third-image'); endif; 								?> 
				</div>
			<div class="postNav">
				<div class="pagination">
				  <ul>
				    <li><?php previous_post_link('%link', '<'); ?></li>

				    <li><?php next_post_link('%link', '>'); ?></li>
				  </ul>
				</div><!-- end pagination -->						
			</div><!-- end postNav -->	
				
			</div> <!-- end span8 -->		
			<div class="span1 navNext"><?php next_post_link('%link', '>'); ?></div>	
	</div> <!-- end row -->

</div> <!-- end container -->

		<!-- Footer -->
	<h6><?php echo $this->element('footer'); ?> </h6>