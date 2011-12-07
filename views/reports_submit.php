<?php


?>

<div id="content">
	<div class="content-bg">
		<!-- start report form block -->
		<?php print form::open(NULL, array('enctype' => 'multipart/form-data', 'id' => 'reportForm', 'name' => 'reportForm', 'class' => 'gen_forms')); ?>
		<input type="hidden" name="latitude" id="latitude" value="<?php echo $form['latitude']; ?>">
		<input type="hidden" name="longitude" id="longitude" value="<?php echo $form['longitude']; ?>">
		<div class="big-block">
			<h1 style="display:none;"><?php echo Kohana::lang('ui_main.reports_submit_new'); ?></h1>
			<?php
				if ($form_error) {
			?>
			<!-- red-box -->
			<div class="red-box">
				<h3>Fel!</h3>
				<ul>
					<?php
						foreach ($errors as $error_item => $error_description)
						{
							// print "<li>" . $error_description . "</li>";
							print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
						}
					?>
				</ul>
			</div>
			<?php
				}
			?>
			<div class="row">
				<input type="hidden" name="form_id" id="form_id" value="<?php echo $id?>">
			</div>
			<div class="report_left">
                 <div class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_location_name'); ?><br /><span class="example"><?php echo Kohana::lang('ui_main.detailed_location_example'); ?> </span></h4>
					<?php print form::input('location_name', $form['location_name'], ' class="text long"'); ?>
				</div>
                  <div class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_categories'); ?><br /><span class="example">
                                          <?php //echo Kohana::lang('ui_main.reports_categories_subtext'); ?>
</span></h4>
					<div class="report_category" id="categories">
						<?php
						$selected_categories = array();
                if (!empty($form['incident_category']) && is_array($form['incident_category'])) {
							$selected_categories = $form['incident_category'];
						}
?>
<ul>
<?php
 /*
$user_categories = Kohana::config('pps.user_categories');
foreach ($categories as $category)
{
  if (in_array($category->category_title, $user_categories))
  {
    foreach ($category->children as $child)
    {
      echo '<li>'.category::display_category_checkbox($child, $selected_categories, 'incident_category').'</li>';
    }
  }
}
 */
 // we display all categories
foreach ($categories as $category)
{
  if ($category->category_visible) {
    echo '<li>'.category::display_category_checkbox($category, $selected_categories, 'incident_category').'</li>';
  }
}
?>
</ul>
					</div>
				</div>
<div class="report_row" id="likert-questions">
<h4>Din bedömning</h4>
<img src="<?php echo url::site('themes/pps/images/likert.png'); ?>" />
<?php echo reports::likert_questions($likert_questions, $likert_responses, $form); ?>
</div>
				<?php
				
				// Action::report_form - Runs right after the report categories
				Event::run('ushahidi_action.report_form');
				?>
				<div class="report_row" >
					<h4><?php echo Kohana::lang('ui_main.reports_title'); ?>
                   </h4>
					<?php print form::textarea('incident_title', $form['incident_title'], ' rows="4" class="textarea long" placeholder="...t.e.x. fler sittplatser eller grönska..."'); ?>
				</div>
				<div class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_description'); ?></h4>
					<?php print form::textarea('incident_description', $form['incident_description'], ' rows="4" class="textarea long" placeholder="förklara varför ditt förslag är bra för de som använder platsen... vad du gör här eller vad du skulle vilja göra här."  ') ?>
				</div>
               
				<div class="report_row" style="display:none" id="datetime_default">
					<h4><a href="#" id="date_toggle" class="show-more"><?php echo Kohana::lang('ui_main.modify_date'); ?></a><?php echo Kohana::lang('ui_main.date_time'); ?>: 
						<?php echo Kohana::lang('ui_main.today_at')." "."<span id='current_time'>".$form['incident_hour']
							.":".$form['incident_minute']." ".$form['incident_ampm']."</span>"; ?></h4>
				</div>
				<div class="report_row hide" style="display:none" id="datetime_edit">
					<div class="date-box">
						<h4><?php echo Kohana::lang('ui_main.reports_date'); ?></h4>
						<?php print form::input('incident_date', $form['incident_date'], ' class="text short"'); ?>								
						<script type="text/javascript">
							$().ready(function() {
								$("#incident_date").datepicker({ 
									showOn: "both", 
									buttonImage: "<?php echo url::base() ?>media/img/icon-calendar.gif", 
									buttonImageOnly: true 
								});
							});
						</script>
					</div>
					<div class="time">
						<h4><?php echo Kohana::lang('ui_main.reports_time'); ?></h4>
						<?php
							for ($i=1; $i <= 12 ; $i++) { 
								$hour_array[sprintf("%02d", $i)] = sprintf("%02d", $i);	 // Add Leading Zero
							}
							for ($j=0; $j <= 59 ; $j++) { 
								$minute_array[sprintf("%02d", $j)] = sprintf("%02d", $j);	// Add Leading Zero
							}
							$ampm_array = array('pm'=>'pm','am'=>'am');
							print form::dropdown('incident_hour',$hour_array,$form['incident_hour']);
							print '<span class="dots">:</span>';
							print form::dropdown('incident_minute',$minute_array,$form['incident_minute']);
							print '<span class="dots">:</span>';
							print form::dropdown('incident_ampm',$ampm_array,$form['incident_ampm']);
						?>
					</div>
					<div style="clear:both; display:block;" id="incident_date_time"></div>
				</div>
				<script type="text/javascript">
					var now = new Date();
					var h=now.getHours();
					var m=now.getMinutes();
					var ampm="am";
					if (h>=12) ampm="pm"; 
					if (h>12) h-=12;
					var hs=(h<10)?("0"+h):h;
					var ms=(m<10)?("0"+m):m;
					$("#current_time").text(hs+":"+ms+" "+ampm);
					$("#incident_hour option[value='"+hs+"']").attr("selected","true");
					$("#incident_minute option[value='"+ms+"']").attr("selected","true");
					$("#incident_ampm option[value='"+ampm+"']").attr("selected","true");
				</script>
				
				<div id="custom_forms">
					
                                <?php
                                
					foreach ($disp_custom_fields as $field_id => $field_property)
					{
						echo "<div class=\"report_row\">";
						echo "<h4>" . $field_property['field_name'] . "</h4>";
						if ($field_property['field_type'] == 1)
						{ // Text Field
							// Is this a date field?
							if ($field_property['field_isdate'] == 1)
							{
								echo form::input('custom_field['.$field_id.']', $form['custom_field'][$field_id],
								' id="custom_field_'.$field_id.'" class="text"');
								echo "<script type=\"text/javascript\">
									$(document).ready(function() {
									$(\"#custom_field_".$field_id."\").datepicker({ 
									showOn: \"both\", 
									buttonImage: \"" . url::base() . "media/img/icon-calendar.gif\", 
									buttonImageOnly: true 
									});
									});
								</script>";
							}
							else
							{
								echo form::input('custom_field['.$field_id.']', $form['custom_field'][$field_id],
								' id="custom_field_'.$field_id.'" class="text custom_text"');
							}
						}
						elseif ($field_property['field_type'] == 2)
						{ // TextArea Field
							echo form::textarea('custom_field['.$field_id.']', $form['custom_field'][$field_id], '  rows="4" class="textarea long"');
						}
						echo "</div>";
					}
					?>
                            </div>
                           
                
             
                
                
                
                
                		<?php if (!$multi_country)
							{
				?>
				<!--<div class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_find_location'); ?></h4>
					<?php print form::dropdown('select_city',$cities,'', ' class="select" '); ?>
				</div>-->
				<?php
					 }
				?>
				<div class="report_row">
                <h4>Markera platsen på kartan</h4>
              	  	<div class="report-find-location">
							<p>Dra den röda markören till platsen.</p> <p>Klicka och dra kartan om du vill flytta den.</p><p> Använd <img src="http://pps.org/placemap/denver/themes/pps/images/plus.gif" / align="absmiddle" style="padding:2px;"> <img src="http://pps.org/placemap/denver/themes/pps/images/minus.gif"  align="absmiddle" style="padding:2px;"/> ikonerna för att zooma in eller ut.</p><br /><p>Om din tanke berör en gata eller ett område, välj en plats i mitten av denna.</p>
                   	</div>
					<div id="divMap" class="report_map"></div>
                    <!--<div style="clear:both;" id="find_text"><?php echo Kohana::lang('ui_main.pinpoint_location'); ?>.</div>-->
					
                   	</div>
					<div class="report-find-location" style="display:none;">
						<?php print form::input('location_find', '', ' title="'.Kohana::lang('ui_main.location_example').'" class="findtext"'); ?>
						<div style="float:left;margin:9px 0 0 5px;"><input type="button" name="button" id="button" value="<?php echo Kohana::lang('ui_main.find_location'); ?>" class="btn_find" /></div>
						<div id="find_loading" class="report-find-loading"></div>
					
				</div>

<div id="demographics">
<div class="report_row">
<h4>Ålder</h4>
<?php
foreach ($demographics_ages as $age) {
echo reports::demographics_age_radio($age, $form) . '<br />';
}
?>
</div>
<div class="report_row">
<h4>Kön</h4>
<?php echo reports::radio_button('demographics_gender', 'male', $form); ?>
Man <br />
<?php echo reports::radio_button('demographics_gender', 'female', $form); ?>
Kvinna <br />
</div>
<div class="report_row">
<h4>I vilken stadsdel bor du?</h4>
<?php echo reports::district_dropdown('demographics_district', $demographics_districts, $form); ?>
</div>
</div>

				<div class="report_optional">
					<h4 style="font-size:150%; font-weight:bold; font-family: Helvetica, arial, serif;"><?php echo Kohana::lang('ui_main.reports_optional'); ?></h4><span class="subtext">
<?php //echo Kohana::lang('ui_main.reports_optional_subtext'); ?>
</span>
					<!-- News Fields -->
				<div id="divNews" class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_news'); ?></h4>
					<?php
						$this_div = "divNews";
						$this_field = "incident_news";
						$this_startid = "news_id";
						$this_field_type = "text";
						if (empty($form[$this_field]))
						{
							$i = 1;
							print "<div class=\"report_row\">";
							print form::input($this_field . '[]', '', ' class="text long2"');
							print "<a href=\"#\" class=\"add\" onClick=\"addFormField('$this_div','$this_field','$this_startid','$this_field_type'); return false;\">add</a>";
							print "</div>";
						}
						else
						{
							$i = 0;
							foreach ($form[$this_field] as $value) {
							print "<div class=\"report_row\" id=\"$i\">\n";

							print form::input($this_field . '[]', $value, ' class="text long2"');
							print "<a href=\"#\" class=\"add\" onClick=\"addFormField('$this_div','$this_field','$this_startid','$this_field_type'); return false;\">add</a>";
							if ($i != 0)
							{
								print "<a href=\"#\" class=\"rem\"	onClick='removeFormField(\"#" . $this_field . "_" . $i . "\"); return false;'>remove</a>";
							}
							print "</div>\n";
							$i++;
						}
					}
					print "<input type=\"hidden\" name=\"$this_startid\" value=\"$i\" id=\"$this_startid\">";
				?><br />
				</div>


				<!-- Video Fields -->
				<div id="divVideo" style="display:none" class="report_row">
					<h4><?php echo Kohana::lang('ui_main.reports_video'); ?></h4>
					<?php
						$this_div = "divVideo";
						$this_field = "incident_video";
						$this_startid = "video_id";
						$this_field_type = "text";

						if (empty($form[$this_field]))
						{
							$i = 1;
							print "<div class=\"report_row\">";
							print form::input($this_field . '[]', '', ' class="text long2"');
							print "<a href=\"#\" class=\"add\" onClick=\"addFormField('$this_div','$this_field','$this_startid','$this_field_type'); return false;\">add</a>";
							print "</div>";
						}
						else
						{
							$i = 0;
							foreach ($form[$this_field] as $value) {
								print "<div class=\"report_row\" id=\"$i\">\n";

								print form::input($this_field . '[]', $value, ' class="text long2"');
								print "<a href=\"#\" class=\"add\" onClick=\"addFormField('$this_div','$this_field','$this_startid','$this_field_type'); return false;\">add</a>";
								if ($i != 0)
								{
									print "<a href=\"#\" class=\"rem\"	onClick='removeFormField(\"#" . $this_field . "_" . $i . "\"); return false;'>remove</a>";
								}
								print "</div>\n";
								$i++;
							}
						}
						print "<input type=\"hidden\" name=\"$this_startid\" value=\"$i\" id=\"$this_startid\">";
					?>
				</div>

				<!-- Photo Fields -->
				<div id="divPhoto"  class="report_row">
                                    <h4><?php echo Kohana::lang('ui_main.reports_photos'); ?>
                                    <span class="discreet" style="margin: 0 0 0 2em">jpg, gif eller png upp till 2 megabyte</span>
                                    </h4>
					<?php
						$this_div = "divPhoto";
						$this_field = "incident_photo";
						$this_startid = "photo_id";
						$this_field_type = "file";

						if (empty($form[$this_field]['name'][0]))
						{
							$i = 1;
							print "<div class=\"report_row\">";
							print form::upload($this_field . '[]', '', ' class="file long2"');
							print "<a href=\"#\" class=\"add\" onClick=\"addFormField('$this_div','$this_field','$this_startid','$this_field_type'); return false;\">add</a>";
							print "</div>";
						}
						else
						{
							$i = 0;
							foreach ($form[$this_field]['name'] as $value) 
							{
								print "<div class=\"report_row\" id=\"$i\">\n";

								// print "\"<strong>" . $value . "</strong>\"" . "<BR />";
								print form::upload($this_field . '[]', $value, ' class="file long2"');
								print "<a href=\"#\" class=\"add\" onClick=\"addFormField('$this_div','$this_field','$this_startid','$this_field_type'); return false;\">add</a>";
								if ($i != 0)
								{
									print "<a href=\"#\" class=\"rem\"	onClick='removeFormField(\"#" . $this_field . "_" . $i . "\"); return false;'>remove</a>";
								}
								print "</div>\n";
								$i++;
							}
						}
						print "<input type=\"hidden\" name=\"$this_startid\" value=\"$i\" id=\"$this_startid\">";
					?>

				</div>
                    <div class="report_row">
							 <h4><?php echo Kohana::lang('ui_main.reports_first'); ?></h4>
                             
							 <?php print form::input('person_first', $form['person_first'], ' class="text long" ', 'value="text"'); ?>
					</div>
					<div class="report_row">
						<h4><?php echo Kohana::lang('ui_main.reports_last'); ?></h4>
						<?php print form::input('person_last', $form['person_last'], ' class="text long"'); ?>
					</div>
                                        <?php if (false): ?>
                                        <div class="report_row">
                                                  <h4>Your Neighborhood <span style="margin-left: 2em" class="discreet">Example: Alta Vista</span></h4>
                                                  <?php print form::input('person_neighborhood', $form['person_neighborhood'], ' class="text long"'); ?>
                                        </div>
                                        
                                        
                                        <?php endif; ?>
                                         <div class="report_row">
						<h4><?php echo Kohana::lang('ui_main.reports_email'); ?><br />
                        <span class="example">Din e-post kommer inte att visas offentligt men kan användas för att meddela dig när din idé är publicerad på hemsidan.
                                                  <?php // echo Kohana::lang('ui_main.reports_email_privacy'); ?>
</span></h4>
						<?php print form::input('person_email', $form['person_email'], ' class="text long"'); ?>
					</div>

                                        <div class="report_row">
                                          <h4>Länk till dig på nätet (personlig blogg, Twitter etc)</h4>
                                          <?php echo form::input('person_connect_link', $form['person_connect_link'], 'class="text long"'); ?>
                                        </div>

                                        <div class="report_row" style="display:none;">
                                          <h4>Neighborhood</h4>
                                          <?php echo form::input('person_neighborhood', $form['person_neighborhood'], 'class="text long"'); ?>
                                        </div>

					
					<?php
					// Action::report_form_optional - Runs in the optional information of the report form
					Event::run('ushahidi_action.report_form_optional');
					?>
				</div>
                
                <div class="report_row" style="text-align:center;">
                                        <img id="submit-spinner" style="display: none"
                                             src="<?php echo url::site('themes/pps/images/progress.gif'); ?>" />
					<input name="submit" type="submit" value="<?php echo Kohana::lang('ui_main.reports_btn_submit'); ?>" class="btn_submit" /> <br />
                    <a class="photothumb" rel="lightbox-group1" href="/placemap/goteborg/themes/pps/images/regler.jpg" style="font-size:12px;">Allmänna regler</a>
				</div>
			</div>
			<div class="report_right sidebar-copy">
                       <h5>Hej! Kul att du kom hit. Vi på Stadsbyggnadskontoret, Trafikkontoret och Centrala Älvstaden i Göteborgs stad vill med den här webbsidan undersöka kvaliteter och brister med offentliga platser i centrala Göteborg. Syftet är att få mer kunskap om hur platser i centrala staden används, upplevs och vilka kvaliteter som efterfrågas av göteborgarna själva. Här kan du också ta del av andras inlägg och kommentera dessa.</h5>
 
 <h5>Webbsidan kommer att vara öppen t.o.m den 12 februari 2012. Som hjälp i detta arbete har kommunen anlitat de svenska konsultföretagen Spacescape och Trivector samt organisationen Project for Public Space från New york.</h5>
                         
			</div>
		</div>
		<?php print form::close(); ?>
		<!-- end report form block -->
	</div>
</div>
<script type="text/javascript">
(function($) {
  $(document).ready(function() {
      var options = {
          allowed: 200,
          warning: 20,
          counterText: "Tecken kvar: ",
          counterElement: 'p'
      };
      $('#incident_title').charCount(options);
      $('#location_name').charCount(options);
  });
})(jQuery);
</script>
