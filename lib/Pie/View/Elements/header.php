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
          <li class="active"><a href="<?php echo site_url(); ?>">Home</a></li>
           <li><a href="<?php echo site_url(244); ?>">News</a></li>
           <li><a href="<?php echo get_page_link(242);?>">Portfolio</a></li>
          <li><a href="<?php echo get_page_link(31);?>">About</a></li>
          <li><a href="<?php echo get_page_link(33);?>">Contact</a></li>
          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Archives</a></li>
                  <li><a href="#">Lien 2</a></li>
                  <li><a href="#">Lien 3</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Autre Categories</li>
                  <li><a href="#">Lien 1</a></li>
                  <li><a href="#">Lien 2</a></li>
                </ul>
              </li>
        </ul>
         <form class="navbar-search pull-right">
 	 	<input type="text" class="search-query" placeholder="Search">
	  </form>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>