<div class="container">
	
	<!-- Banner -->
	<?php echo $this->element('banner'); ?> 
	
	<div class="row">
		

		<?php foreach( $posts as $post ){ ?>
		
			<div class="span4">
				<h2><?php echo $post->post_title; ?></h2>
				<h4><?php echo $post->post_date; ?></h4>
				<p><?php echo $post->post_content; ?></p>
			</div> <!-- end span4 -->		
		<?php } ?>
				
	</div> <!-- end row -->
</div> <!-- end container -->








	