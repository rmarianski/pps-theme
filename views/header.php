<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title><?php echo $site_name; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="shortcut icon" href="/placemap/denver/favicon.ico">

   <link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" type="text/css" href="http://pps.org/placemap/sanantonio/media/css/picbox/picbox.css" />
<link rel="stylesheet" type="text/css" href="http://pps.org/placemap/sanantonio/media/css/videoslider.css" />
	<?php echo $header_block; ?>
	<?php
	// Action::header_scripts - Additional Inline Scripts from Plugins
	Event::run('ushahidi_action.header_scripts');
	?>
    <script type="text/javascript" src="http://pps.org/placemap/sanantonio/media/js/picbox.js"></script>
<script type="text/javascript" src="http://pps.org/placemap/sanantonio/media/js/coda-slider.pack.js"></script>
<meta property="og:title" content="Bästa Platsen!" />
<meta property="og:type" content="website" />
<?php if (!isset($og_description) OR !$og_description): ?>
<?php $og_description = "Hjälp oss hitta det bästa och sämsta med centrala Göteborgs platser"; ?>
<?php endif; ?>
<meta property="og:description" content="<?php echo $og_description; ?>" />
<meta property="og:url" content="<?php echo url::base() . url::current() ?>" /> 
<meta property="og:image" content="<?php echo url::site('themes/pps/images/opacity-white.jpg'); ?>" />
<meta property="og:site_name" content="<?php echo $site_name; ?>" />
<meta property="fb:admins" content="<?php echo Kohana::config('pps.fb_admins'); ?>" />



  <script type="text/javascript">var switchTo5x=false;</script><script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher:'247bd840-c484-4e7e-8df6-e3412a4fb36c'});</script>
</head>

<body id="page" style="position: initial; min-height: 100%; top: 0px;">
<div>
    
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<!-- wrapper -->
	<div class="rapidxwpr floatholder">


		<!-- header -->
		<div id="header">

			<!-- searchbox -->
			<div id="searchbox" style="float:left;">
            
         <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style " addthis:url="http://bit.ly/z6oMPi" addthis:title="Hjälp oss hitta det bästa och sämsta med centrala Göteborgs platser. #StadslivGöteborg">
<a class="addthis_button_tweet" tw:via=""></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4dcac49b08b3e729"></script>
<!-- AddThis Button END --><br /><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fpps.org%2Fplacemap%2Fgoteborg%2Freports%2Fsubmit&amp;send=false&amp;layout=box_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:90px; padding-top:30px" allowTransparency="true"></iframe>
				<!-- languages -->
   <?php // echo $languages;?>
				<!-- / languages -->

				<!-- searchform -->
				<!--<?php echo $search; ?>-->
				<!-- / searchform -->

			</div>
			<!-- / searchbox -->

			<!-- logo -->
			<div id="logo">
				<h1><?php echo $site_name; ?></h1>
				<h2><?php echo $site_tagline; ?></h2>
   </div><a href="<?php echo url::site('reports/submit'); ?>"><span><?php echo url::site('reports/submit'); ?></span></a>
			<!-- / logo -->

			<!-- submit incident -->
			<!--<?php echo $submit_btn; ?>-->
			<!-- / submit incident -->
			
		</div>
		<!-- / header -->

		<!-- main body -->
		<div id="middle">
			<div class="background layoutleft">

				<!-- mainmenu -->
				<div id="mainmenu" class="clearingfix">
   <?php $dontshow = array('contact'); ?>
                        <ul><h1><?php nav::main_tabs($this_page, $dontshow); ?></h1></ul>
                    

				</div>
				<!-- / mainmenu -->
