			</div>
		</div>
		<!-- / main body -->

	</div>
	<!-- / wrapper -->
	
	<!-- footer -->
	<div id="footer" class="clearingfix">
 
		<div id="underfooter"></div>
				
		<!-- footer content -->
		<div class="rapidxwpr floatholder">
 
			<!-- footer credits -->
			<!--<div class="footer-credits">
				Powered by the &nbsp;<a href="http://www.ushahidi.com/"><img src="<?php echo url::base(); ?>/media/img/footer-logo.png" alt="Ushahidi" style="vertical-align:middle" /></a>&nbsp; Platform
			</div>-->
			<!-- / footer credits -->
		
			<!-- footer menu -->
			<!--<div class="footermenu">
				<ul class="clearingfix">
					<li><a class="item1" href="<?php echo url::site(); ?>"><?php echo Kohana::lang('ui_main.home'); ?></a></li>
					<li><a href="<?php echo url::site()."reports/submit"; ?>"><?php echo Kohana::lang('ui_main.report_an_incident'); ?></a></li>
					<li><a href="<?php echo url::site()."alerts"; ?>"><?php echo Kohana::lang('ui_main.alerts'); ?></a></li>
					<li><a href="<?php echo url::site()."help"; ?>"><?php echo Kohana::lang('ui_main.help'); ?></a></li>
					<li><a href="<?php echo url::site()."contact"; ?>"><?php echo Kohana::lang('ui_main.contact'); ?></a></li>
					<?php
					// Action::nav_main_bottom - Add items to the bottom links
					Event::run('ushahidi_action.nav_main_bottom');
					?>
				</ul>
				<?php if($site_copyright_statement != '') { ?>
      		<p><?php echo $site_copyright_statement; ?></p>
      	<?php } ?>
			</div>-->
			<!-- / footer menu -->
         

      
			<!--<h2 class="feedback_title" style="clear:both">
				<a href="http://feedback.ushahidi.com/fillsurvey.php?sid=5"><?php echo Kohana::lang('ui_main.feedback'); ?></a>
			</h2>-->
            
       <table border="0">
 
  <tr>
  <td valign="top" width="250px" style="padding-left:20px; padding-right:20px; padding-bottom:20px;"><br /><a href="http://www.goteborg.se/wps/portal"><img style="margin-right:40px" src="<?php echo url::site('themes/pps/images/goteborgs-stad-logo.png'); ?>" ></a></td>
  <td valign="top" width="150px" style="padding-left:20px; padding-right:20px; padding-bottom:20px;">Websidan är producerad av:<br />
    <br /><a href="http://www.pps.org"><img style="margin-right:40px" src="<?php echo url::site('themes/pps/images/PPS-logo.png'); ?>" ></a><br /><a href="http://www.spacescape.se"><img style="margin-right:40px" src="<?php echo url::site('themes/pps/images/spacescape-logo.png') ?>"></a></td>
    
    
    
    <td valign="top" width="150px" style="padding-left:20px; padding-right:20px; padding-bottom:20px;">      		<p style="font-size:10px;">All content, unless otherwise noted, in this work by <a href="http://pps.org">Project for Public Spaces</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a>.<br /><br /><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a></p>
      	</td> <td valign="top" width="100px" style="padding-left:20px; padding-right:20px; padding-bottom:20px;">      		<p style="font-size:10px;">A <a href="https://github.com/projectforpublicspaces/Ushahidi_Web/tree/pps">PPS Ushahidi remix</a> licensed under <a href="http://www.gnu.org/copyleft/gpl.html">GPL3</a><br />
      	  <br /><img style="margin-right:20px" src="<?php echo url::site('themes/pps/images/osi_standard_logo.png'); ?>" ></p>
      	</td>

    
    
    
  </tr>
</table>



 	<?php echo $ushahidi_stats; ?>
	<?php echo $google_analytics; ?>
	
	<!-- Task Scheduler -->
	<img src="<?php echo url::base(); ?>media/img/spacer.gif" alt="" height="1" width="1" border="0" onload="runScheduler(this)" />
        <?php echo html::script(array('themes/pps/js/charCount.js', 'themes/pps/js/jquery.scrollTo-min.js')); ?>
	<?php
	// Action::main_footer - Add items before the </body> tag
	Event::run('ushahidi_action.main_footer');
	?>
		</div>
         
		<!-- / footer content -->
 
	</div>
	<!-- / footer -->
 

</body>
</html>