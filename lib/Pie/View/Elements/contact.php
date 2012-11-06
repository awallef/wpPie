<div class="container">
<!-- Banner -->
	<?php echo $this->element('banner'); ?>
	<div class="row">
		<div class="span8">
		<form action="#" method="get" accept-charset="utf-8">
				<fieldset>
					<div id="contactFieldsLeft">
						<p>
							<label for="nom">NOM</label><br />
							<input type="text" name="nom" value="" id="nom">
						</p>
						<p>
							<label for="prenom">PRENOM</label><br />
							<input type="text" name="prenom" value="" id="prenom">
						</p>
						<p>
							<label for="email">MAIL</label><br />
							<input type="text" name="email" value="" id="email">
						</p>
					</div>
					<div id="contactFieldsRight">
						<p>
							<label for="message">MESSAGE</label><br />
							<textarea  rows="9" name="message" id="message"></textarea>
						</p>
						
					</div>
				</fieldset>
					<input type="submit" value="ENVOYER" class="submitButton fright">
		</form>

		</div>
	</div>
</div>