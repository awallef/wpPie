<!-- About View -->

<div class="container">
	
	<!-- Banner -->
	<?php echo $this->element('banner'); ?> 
	
	<div class="row">
		

		<?php foreach( $posts as $post ){ ?>
		
		<?php //print_r($post); ?>
			<div class="span4">
			</div> <!-- end span4 -->		
		<?php } ?>
	</div> <!-- end row -->
	<!-- Footer -->
	<h6><?php echo $this->element('footer'); ?> </h6>
	
</div> <!-- end container -->
</div>
