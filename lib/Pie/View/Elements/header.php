<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php echo site_url(); ?>"> <span class="blueText"><?php bloginfo('name'); ?></span> </a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header' ) ); ?>
          
          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Archives</a></li>
                  <li><a href="#">Gallery</a></li>
                  <li><a href="#">Lien 3</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Autre Categories</li>
                  <li><a href="#">Lien 1</a></li>
                  <li><a href="#">Lien 2</a></li>
                </ul>
              </li>
        </ul>
        
       
        <form class="navbar-search pull-left" method="get" id="searchform" action="<?php bloginfo('name'); ?>/">
	<div>
		<input class="search-query" placeholder="Search" type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	</div>
</form>    </div>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
