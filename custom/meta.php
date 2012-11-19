<div class="my_meta_control">
	
	<p>Add a New Member on the "About us" page.</p>

	<label>Nom, Prénom</label>

	<p>
		<input type="text" name="_my_meta[link]" value="<?php if(!empty($meta['link'])) echo $meta['link']; ?>"/>
		
	</p>

	<label>Description <span>(optional)</span></label>

	<p>
		<textarea name="_my_meta[description]" rows="3"><?php if(!empty($meta['description'])) echo $meta['description']; ?></textarea>
		
	</p>

</div>