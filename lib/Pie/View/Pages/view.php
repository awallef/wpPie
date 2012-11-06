<!-- Pages View -->

<div class="container">
<!-- Banner -->
	<?php echo $this->element('banner'); ?>
	<div class="row">
	
	<form action="#" method="get" accept-charset="utf-8">
		<fieldset>
		<div class="span4">
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
		<div class="span4">
			<p>
				<label for="message">MESSAGE</label><br />
				<textarea  rows="12" name="message" id="message"></textarea>
			</p>
			<p>
			

    <a class="btn btn-primary btn-medium pull-right">
      Learn more
    </a>
  </p>
		</div>		
		<div class="span4">
	
	<iframe width="370" height="295" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ch/maps?f=q&amp;source=s_q&amp;hl=fr&amp;geocode=&amp;q=Chemin+de+la+Cure+12+13,+Belmont-sur-Lausanne&amp;aq=0&amp;oq=chemin+de+la+cure+12+13&amp;sll=46.58687,6.656635&amp;sspn=1.485511,3.284912&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Chemin+de+la+Cure+12,+1092+Belmont-sur-Lausanne,+Vaud&amp;ll=46.519734,6.680421&amp;spn=0.002054,0.003208&amp;z=14&amp;output=embed"></iframe>
	</div>

	</div>
	<?php echo $this->element('footer'); ?>
</div>
