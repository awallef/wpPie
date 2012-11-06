<!-- Home View -->

<div class="container">
	
	<!-- Banner -->
	<?php echo $this->element('banner'); ?> 
	
	<div class="row">
		

		<?php foreach( $posts as $post ){ ?>
		
		<?php //print_r($post); ?>
			<div class="span4">
				<h2><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h2>
				
				<h6><?php $user_info = get_userdata(1);
     			echo $post->post_date; 
     			echo 'posted by: ' . $user_info->user_login . "\n";?>
     			</h6>
     			<h6> <?php $category = get_the_category();
						   $currentcat = $category[0]->cat_name;
						   echo 'in: ' . $currentcat. "\n";
					 ?>
				</h6>
				<p><?php echo $post->post_content; ?></p>

			</div> <!-- end span4 -->		
		<?php } ?>
	</div> <!-- end row -->
	<!-- Footer -->
	<h6><?php echo $this->element('footer'); ?> </h6>
	
</div> <!-- end container -->
</div>
