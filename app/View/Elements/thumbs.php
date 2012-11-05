<?php

function getImageThumb( $src ){
	preg_match('~/embed/([0-9a-z_-]+)~i', $src, $matches);
	if( !empty($matches) )
	{
		$src = 'http://img.youtube.com/vi/'.$matches[1].'/0.jpg';//$matches[1];
	}else{
		$src = $this->Html->url('/file_system/assets/icons/youtube.jpeg');
	}
	
	return $src;
}
?>


<?php
for( $i = 0; $i < count($posts); $i++ )
{

	$color = ($i%2 == 0)?'blue' : 'grey';
	
?>

	<div class="videoThumb">
		
		<div class="videoImageContainer">
			<a href="<?php echo $posts[$i]['guid']; ?>">
				<img src="<?php echo getImageThumb($posts[$i]['video']);  ?>" width="100%" />
			</a>
		</div>
			
		<div class="videoTitle">
			<?php echo $posts[$i]['post_title'];  ?>
		</div>
		
		<div class="videoText <?php echo $color ?>">
			<?php echo $posts[$i]['post_content'];  ?>
		</div>
		
	</div>

<?php
}

?>

	<div class="videoThumb">
		
		<a href="<?php echo site_url(); ?>/game/play" target="_blank">
			<div class="videoImageContainer">
			
				<img src="<?php echo ASSETS .'layout/game.jpg';  ?>" width="100%" />
			
			</div>
		</a>
			
		<div class="videoTitle">
			Testez-vous!
		</div>
		
		<div class="videoText pink">
			Testez vos connaissances en matière de prévention incendie. Passez sur le grill de notre quiz et devenez champion du réflexe prévention
		</div>
		
	</div>


<div class="clear"></div>


