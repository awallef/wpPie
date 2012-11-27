<!-- Portfolio Page -->

<div class="container">
		<div class="span6 filters">
				<!-- <span class="filterText">FILTERS | </span><ul> <?php wp_list_categories( '&title_li= ' ); ?></ul> -->
				
				<span class="filterText">FILTERS | </span>
				
				<ul>  
				<li><a href="">Action </a>/</li>
				<li><a href="">Photography </a>/</li>
				<li><a href="">Webdesign </a>/</li>
				<li><a href="">Print</a></li>
				</ul>
		</div>
					<div class="row portfolio">

		<?php foreach( $portfolios as $portfolio ){ ?>	
			<div class="span4">
					<?php 
						//echo '<span class="label">'. $cat->name. '</span>';
		
		 				if ( has_post_thumbnail($portfolio->ID)) {
							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($portfolio->ID), 'project-thumb');
							
							echo '<a href="' . get_permalink($portfolio->ID) . '""><img src="' . $large_image_url[0] . '" ></a>';
							echo '</a>';
							}		
					?>
				
				</p>
			</div> <!-- end span4 -->		
		<?php } ?>
	</div><!-- end row -->
	
</div><!-- end container -->





