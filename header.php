<?php
	require_once "Mobile_Detect.php";
	$GLOBALS["detect"] = new Mobile_Detect;
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
          <html xmlns="https://www.w3.org/1999/xhtml">';
?>
<head>
        <title>קדמון ברין | עיצוב תערוכות | ביתנים מנוגרים | ביתנים מודולארים | ביתנים מודולרים | ביתנים מודלוריים | ביתנים מודולאריים | ביתנים לתערוכה | ביתן לתערוכה</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="description" content="קדמון ברין - מעצבי תערוכות מובילים. אנו מובילים את התחום בארץ ובעולם: עיצוב תערוכות, עיצוב ביתנים לתערוכות וביתנים מודולריים. צפו בגלריות שלנו."/>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />	
		<meta name="format-detection" content="telephone=no" />
        <link href="<?=get_template_directory_uri()?>/style.css?v=1.8" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="<?=get_template_directory_uri()?>/images/kadmon-favicon.ico" />
        <script type="text/javascript" language="javascript" src="<?=get_template_directory_uri()?>/js/jquery-1.9.1.min.js" ></script> 
        <script type="text/javascript" language="javascript" src="<?=get_template_directory_uri()?>/js/jquery.mousewheel.min.js" ></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet" type="text/css" />
        <script type="text/javascript" language="javascript" src="<?=get_template_directory_uri()?>/js/elements.js?v=1.5" ></script> 
        <!--[if IE]>
            <style>
                .rtl {font-family: OpenSansHebrewIE !imporant;  }
            </style>
        <![endif]-->

		<script>
			window.isMobile = <?=var_export($GLOBALS["detect"]->isMobile(),true)?>;
		</script>
</head>
	<body>
                <div id="header">
                    <div id="header_content">
                        <?php
                            $logoclass = is_front_page() ? ' class="ball_pointer"' : "";
                        ?>
                        <div id="logo"<?=$logoclass?>>
                            <a href="/"><img src="<?=get_template_directory_uri()?>/images/logo.png" /></a>
                        </div>
                        <div id="main_menu">                     
                            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                        </div>
                        <div id="mini_menu">                     
                            <?php wp_nav_menu( array( 'theme_location' => 'mini-menu' ) ); ?>
                        </div>
                    </div>
                </div>
                    
                    