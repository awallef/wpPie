<?php 
/* 
Post Template: About Us 
*/ 
?>

<div class="container">

	<div class="row">
			
			<div class="span8 offset2">
			
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
				
				</div>
			<div class="postNav">
				<div class="pagination">
				  <ul>
				    <li><?php previous_post_link('%link', 'Previous'); ?></li>

				    <li><?php next_post_link('%link', 'Next'); ?></li>
				  </ul>
				</div><!-- end pagination -->						
			</div><!-- end postNav -->	
				
			</div> <!-- end span8 -->		
			<div class="span1"></div>	
	</div> <!-- end row -->
