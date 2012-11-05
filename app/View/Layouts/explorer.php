<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head profile="http://gmpg.org/xfn/11">
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
        <?php if (is_search()) { ?>
            <meta name="robots" content="noindex, nofollow" /> 
        <?php } ?>

        <title>Réflexe Prévention</title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo CSS . 'screen.css'; ?>" type="text/css" />
        
        <script type="text/javascript" src="<?php echo JS . 'jquery-1.8.2.min.js'; ?>" ></script>
        <script type="text/javascript" src="<?php echo JS . 'responsive-explorer.js'; ?>" ></script>
        
        
        <?php wp_head(); ?>

        <script type="text/javascript">
                    
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-16652220-3']);
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
                <div class="flex">
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
            <?php /*echo $this->element('footer');*/ ?>
        </footer>

    </body>
</html>