
<div id="content">
	<div class="content-bg">
		<!-- start block -->
		<div class="big-block">
			
			<!-- green-box -->
			<div class="green-box">
				<div class="thanks_msg">
                <h4><?php echo Kohana::lang('ui_main.reports_submit_new');?></h4>
				<p  style="font-size:16px"><?php echo Kohana::lang('ui_main.reports_submitted');?></p><br />
				<br />

				<p style="font-size:14px">Fler sätt att delta:<br />
				  <ul><li>Du kan berätta hur du upplever ytterligare en plats och <a href="../reports/submit">föreslå förbättringar</a></li>
                    <li>Kommentera andras idéer, kolla in <a href="../main">idékartan</a> eller <a href="../reports">idélistan</a>.</li></ul><br /> Under tiden kan du hjälpa till att sprida sidan genom att:
                   <ul><li>Dela den här på <span class='st_facebook_button' displayText='Facebook'></span> eller  <span class='st_twitter_button' displayText='Tweet' st_url="http://pps.org/placemap/pbnyc39/reports/submit" st_title="I just shared my idea ... What's yours?  #..."></span> för att få dina vänner att tycka till om staden.</li>
                   <li>Blogga om denna enkät</li>
<li>Be en vän skicka sina idéer och få dem publicerade</li>
                    </ul>
</p>	
                
            <a href="<?php echo
					url::site().'reports' ?>"><?php echo Kohana::lang('ui_main.reports_return');?></a>
					<?php echo Kohana::lang('ui_main.feedback_reports');?>
					<?php 
					print form::open('http://feedback.ushahidi.com/fillsurvey.php?sid=2', array('target'=>'_blank'));
					print form::hidden('alert_code', $_SERVER['SERVER_NAME']);
					print "&nbsp;&nbsp;";
					/*print form::submit('button', Kohana::lang('ui_main.feedback'), ' class=btn_gray ');*/
					print form::close();
					?>
				</div>
			</div>
		</div>
		<!-- end block -->
	</div>
</div>