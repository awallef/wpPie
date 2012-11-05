<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head profile="http://gmpg.org/xfn/11">
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
        <?php if (is_search()) { ?>
            <meta name="robots" content="noindex, nofollow" /> 
        <?php } ?>

        <?php if( !preg_match( '/(?i)msie [1-8]/', $_SERVER['HTTP_USER_AGENT'])  ) {  ?>
	        <?php /* ================ MOBILE =================== */ ?>
	        <script type="text/javascript">
	            (function(document,navigator,standalone) {
	                // prevents links from apps from oppening in mobile safari
	                // this javascript must be the first script in your <head>
	                if ((standalone in navigator) && navigator[standalone]) {
	                    var curnode, location=document.location, stop=/^(a|html)$/i;
	                    document.addEventListener('click', function(e) {
	                        curnode=e.target;
	                        while (!(stop).test(curnode.nodeName)) {
	                            curnode=curnode.parentNode;
	                        }
	                        // Condidions to do this only on links to your own app
	                        // if you want all links, use if('href' in curnode) instead.
	                        if('href' in curnode && ( curnode.href.indexOf('http') || ~curnode.href.indexOf(location.host) ) ) {
	                            e.preventDefault();
	                            location.href = curnode.href;
	                        }
	                    },false);
	                }
	            })(document,window.navigator,'standalone');
	        </script>
	        
	        <meta name="viewport" content = "width = device-width, initial-scale = 1, minimum-scale = 1, user-scalable = no" /> 
	        <meta name="apple-mobile-web-app-capable" content="yes" />
	        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <?php } ?>

        <title>Réflexe Prévention</title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo CSS . 'screen.css'; ?>" type="text/css" />
        
		<?php if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
			<link rel="stylesheet" type="text/css" href="<?php echo CSS . 'ie.css'; ?>" />
		<?php } ?>
        
        <script type="text/javascript" src="<?php echo JS . 'jquery-1.8.2.min.js'; ?>" ></script>
        <script type="text/javascript" src="<?php echo JS . 'responsive.js'; ?>" ></script>

        <?php wp_head(); ?>

        <script type="text/javascript">
                    
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-16652220-3']);
            
            _gaq.push(['_setCampSourceKey', 'utm_source']);
			_gaq.push(['_setCampMediumKey', 'utm_medium']);
			_gaq.push(['_setCampNameKey', 'utm_campaign']);
            
            _gaq.push(['_trackPageview']);
                    
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
                    
        </script>

    </head>

    <body>

        <div id="container">

            <header id="header">
                <div class="flex" id="flexHeader">
                    <?php echo $this->element('header'); ?>
                </div>
            </header>

            <section id="content">
                <div class="flex">
                    <?php echo $content_for_layout; ?>
                </div>
            </section>

        </div>
        <footer id="footer">
            <?php echo $this->element('footer'); ?>
        </footer>

    </body>
</html>