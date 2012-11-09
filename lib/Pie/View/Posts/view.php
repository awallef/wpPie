<!-- Posts View -->

<div class="container">
	
	<!-- Banner -->
	<?php echo $this->element('banner'); ?> 
	
	<div class="row">
		

		
		
		<?php //print_r($post); ?>
			<div class="span1"></div>
			<div class="span5">
			<?php 
				$id = get_the_id();
				$post = get_post($id);
				$title = $post->post_title;?>
				<h1><?php echo $title;?></h1>
				<h6><?php $user_info = get_userdata(1);
     			//echo $post->post_date;
     			echo 'posted by: ' . $user_info->user_login . "\n";?></h6>
				<?php
				echo $post->post_content; ?>
			<div class="postNav">
				<< Previous post Next Post >>
						
			</div>	
				
			</div> <!-- end span5 -->
			<div class="span5">
				<?php 
					 if ( has_post_thumbnail()) {
					   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
					   echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
					   the_post_thumbnail('large');
					   echo '</a>';
					 }
					 ?>	
			</div><!-- end span5 -->		
			<div class="span1"></div>	
	</div> <!-- end row -->
	<!-- Footer -->
	<h6><?php echo $this->element('footer'); ?> </h6>
</div> <!-- end container -->
</div>
