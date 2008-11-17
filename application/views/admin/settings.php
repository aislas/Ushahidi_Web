			<div class="bg">
				<h2><?php echo $title; ?> <a href="<?php echo url::base() . 'admin/settings/site' ?>">Site</a><a href="<?php echo url::base() . 'admin/settings' ?>" class="active">Map</a><a href="<?php echo url::base() . 'admin/settings/sms' ?>">SMS</a><a href="<?php echo url::base() . 'admin/settings/sharing' ?>">Sharing</a></h2>
				<?php print form::open(); ?>
					<input type="hidden" id="default_zoom" name="default_zoom" value="<?php echo $form['default_zoom']; ?>" />
					<div class="report-form">
						<?php
						if ($form_error) {
							print_r($errors);
						?>
							<!-- red-box -->
							<div class="red-box">
								<h3>Error!</h3>
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
						
						if ($form_saved) {
						?>
							<!-- green-box -->
							<div class="green-box">
								<h3>Your Settings Have Been Saved!</h3>
							</div>
						<?php
						}
						?>
						<div class="head">
							<h3>Map Settings</h3>
							<input type="image" src="<?php echo url::base() ?>media/img/admin/btn-cancel.gif" class="cancel-btn" />
							<input type="image" src="<?php echo url::base() ?>media/img/admin/btn-save-settings.gif" class="save-rep-btn" />
						</div>
						<!-- column -->
						<div class="l-column">
							<div class="has_border_first">
								<div class="row">
									<h4>Site Name</h4>
									<?php print form::input('site_name', $form['site_name'], ' class="text"'); ?>
								</div>
								<div class="row">
									<h4>Default Location <sup><a href="#">?</a></sup></h4>
									<p class="bold_desc">Please set a default location. This is a bit more text about setting the default location.</p>
									<span class="my-sel-holder">
										<?php print form::dropdown('default_country',$countries,$form['default_country']); ?>
									</span>
									
									<div id="retrieve_cities">
										<a href="javascript:retrieveCities()" id="retrieve">Retrieve Cities From Geonames</a>
										<span id="cities_loading"></span>
										<div id="city_count"></div>
									</div>
								</div>
							</div>
							<div class="has_border">
								<h4>Map provider <sup><a href="#">?</a></sup></h4>
								<p class="bold_desc">Setting up your map provider is a straight- forward process. More text to go here!</p>
								<span class="blue_span">Step 1: </span><span class="dark_span">Select a Map Provider</span><br />
								<div class="c_push">
									<span class="my-sel-holder">
										<?php 
										$map_providers = array('1'=>'Google', '2'=>'Virtual Earth', '3'=>'Yahoo', '4'=>'Open Streetmaps');
										print form::dropdown('default_map',$map_providers,$form['default_map']); 
										?>
									</span>
								</div>
	
								<span class="blue_span">Step 2: </span><span class="dark_span">Get an API Key</span><br />
								<div class="c_push">
									<a href="#" id="api_link" title="Get API Key"><img src="<?php echo url::base() ?>media/img/admin/btn-get-api-key.gif" border="0" alt="Get API Key"></a>
								</div>
								
								<div id="api_div_google" <?php if ($form['default_map'] != 1 && $form['default_map'] != 4) echo "style=\"display:none\""; ?>>
									<span class="blue_span">Step 3: </span><span class="dark_span">Enter Your Google API Key</span><br />
									<div class="c_push">
										<?php print form::input('api_google', $form['api_google'], ' class="text"'); ?>
									</div>
								</div>
								<div id="api_div_yahoo" <?php if ($form['default_map'] != 3) echo "style=\"display:none\""; ?>>
									<span class="blue_span">Step 3: </span><span class="dark_span">Enter Your Yahoo API Key</span><br />
									<div class="c_push">
										<?php print form::input('api_yahoo', $form['api_yahoo'], ' class="text"'); ?>
									</div>
								</div>
							</div>
	
								<input type="image" src="<?php echo url::base() ?>media/img/admin/btn-save-settings.gif" class="save-rep-btn" style="margin-left: 0px;" />
								<input type="image" src="<?php echo url::base() ?>media/img/admin/btn-cancel.gif" class="cancel-btn" />
						</div>
						<div class="r-column">
							<h4>Configure Map <sup><a href="#">?</a></sup></h4>

							<div style="width: 279px; float: left; margin-top: 10px;">
								<span class="bold_span">Default Zoom Level</span>
								<div class="slider_container">
									<div id="zoom1" class="ui-slider-1">
										<div class="ui-slider-handle" id="handleholder1"><img src="<?php echo url::base() ?>media/img/slider-handle-inactive.gif" id="handleQ7"></div>
									</div>
									Zoom Level : <span id="zoom_level" class="slider_zoom">"<?php echo $form['default_zoom']; ?>"</span>
								</div>
							</div>
							<div style="width: 279px; height: 90px; float: left; margin-top: 10px;">
								<span class="bold_span">Default Map View</span>
								<span class="my-sel-holder"><select><option>Map</option></select></span>
								<div class="location-info">
									<span>Lat:</span>
									<?php print form::input('default_lat', $form['default_lat'], ' readonly="readonly" class="text"'); ?>
									<span>Lon:</span>
									<?php print form::input('default_lon', $form['default_lon'], ' readonly="readonly" class="text"'); ?>
								</div>
							</div>

							<h4>Map preview <sup><a href="#">?</a></sup></h4>
							<p class="bold_desc">Click and drag the map to set your exact location.</p>

							<div id="map_holder">
								<div id="map" class="mapstraction"></div>    
							</div>
							<div style="margin-top:25px" id="map_loaded"></div>
						</div>
					</div>
				<?php print form::close(); ?>
			</div>