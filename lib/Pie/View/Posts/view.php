<!-- Posts View -->
	<!-- Banner -->
	<?php echo $this->element('banner'); ?> 
<div class="container">

	
	<div class="row">
			<div class="span1"></div>
			<div class="span5">
			<?php 
				$id = get_the_id();
				$post = get_post($id);
				$title = $post->post_title;?>
				<h1><?php echo $title;?></h1>
				<h6><?php $user_info = get_userdata(1);
     				echo 'posted by: ' . $user_info->user_login . "\n";
     		?></h6>
				<?php
					echo $post->post_content; 
				?>
			<div class="postNav">
				<div class="pagination">
				  <ul>
				    <li><?php previous_post_link('%link', 'Previous'); ?></li>

				    <li><?php next_post_link('%link', 'Next'); ?></li>
				  </ul>
				</div><!-- end pagination -->						
			</div><!-- end postNav -->	
				
			</div> <!-- end span5 -->
			<div class="span5">
				<?php 
					 if ( has_post_thumbnail()) {

					   the_post_thumbnail('featured-thumb');
					 }
					 ?>	
			</div><!-- end span5 -->		
			<div class="span1"></div>	
	</div> <!-- end row -->

</div> <!-- end container -->

		<!-- Footer -->
	<h6><?php echo $this->element('footer'); ?> </h6>