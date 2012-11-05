<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head >
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	
	<title>Title</title>
	
	<link rel="stylesheet" href="<?php echo CSS .'bootstrap.min.css'; ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo CSS .'screen.css'; ?>" type="text/css" />
	
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
	<script type="text/javascript" src="<?php echo JS . 'web_app_wrap.js'; ?>" ></script>
	<script type="text/javascript" src="<?php echo JS . 'jquery-1.8.2.min.js'; ?>" ></script>
	<script type="text/javascript" src="<?php echo JS . 'bootstrap.min.js'; ?>" ></script>
	
	<meta name="viewport" content = "width = device-width, initial-scale = 1, minimum-scale = 1, user-scalable = no" /> 
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	
	<?php wp_head(); ?>
	
</head>

<body>
	
	<!-- header -->
	<?php echo $this->element('header'); ?>
	
	<!-- content -->
	<?php echo $content_for_layout; ?>
	
	<!-- footer -->
	<?php echo $this->element('footer'); ?>

</body>
</html>