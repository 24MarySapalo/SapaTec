<?php
//about theme info
add_action( 'admin_menu', 'digital_agency_lite_gettingstarted' );
function digital_agency_lite_gettingstarted() {    	
	add_theme_page( esc_html__('About Digital Agency Lite', 'digital-agency-lite'), esc_html__('About Digital Agency Lite', 'digital-agency-lite'), 'edit_theme_options', 'digital_agency_lite_guide', 'digital_agency_lite_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function digital_agency_lite_admin_theme_style() {
   wp_enqueue_style('digital-agency-lite-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('digital-agency-lite-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'digital_agency_lite_admin_theme_style');

//guidline for about theme
function digital_agency_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'digital-agency-lite' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Digital Agency Lite Theme', 'digital-agency-lite' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','digital-agency-lite'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Digital Agency Pro at 20% Discount','digital-agency-lite'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','digital-agency-lite'); ?> ( <span><?php esc_html_e('vwpro20','digital-agency-lite'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( DIGITAL_AGENCY_LITE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'digital-agency-lite' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="digital_agency_lite_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'digital-agency-lite' ); ?></button>
			<button class="tablinks" onclick="digital_agency_lite_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'digital-agency-lite' ); ?></button>
			<button class="tablinks" onclick="digital_agency_lite_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'digital-agency-lite' ); ?></button>
			<button class="tablinks" onclick="digital_agency_lite_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'digital-agency-lite' ); ?></button>
		  	<button class="tablinks" onclick="digital_agency_lite_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'digital-agency-lite' ); ?></button>
		  	<button class="tablinks" onclick="digital_agency_lite_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'digital-agency-lite' ); ?></button>
		</div>

		<?php
			$digital_agency_lite_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$digital_agency_lite_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Digital_Agency_Lite_Plugin_Activation_Settings::get_instance();
				$digital_agency_lite_actions = $plugin_ins->recommended_actions;
				?>
				<div class="digital-agency-lite-recommended-plugins">
				    <div class="digital-agency-lite-action-list">
				        <?php if ($digital_agency_lite_actions): foreach ($digital_agency_lite_actions as $key => $digital_agency_lite_actionValue): ?>
				                <div class="digital-agency-lite-action" id="<?php echo esc_attr($digital_agency_lite_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($digital_agency_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($digital_agency_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($digital_agency_lite_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','digital-agency-lite'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($digital_agency_lite_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'digital-agency-lite' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('Digital Agency WordPress theme is a conceptually designed theme for various digital services like website development, website designing, internet marketing and SEO. It is a multipurpose and minimal theme making it a good choice for various digital products like ebooks, tutorials, music, themes, plugins, software, code snippets, videos, photos. Digital agency WordPress theme free is retina ready, user friendly and responsive and permits sale of digital products by making use of easy digital download plugin. Although this WordPress theme is available for free, it has many features at par with the premium one and you can sell various digital items like stock photos, plugins, softwares, audio files, videos, music, and digital art such as icons, templates, themes, or photos. It has the features like personalization options and testimonial section. Above all, the coding associated with this WP theme is clean as a result making it bug free. Being mobile responsive, website looks good on Macs, mobile devices or PCs.','digital-agency-lite'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'digital-agency-lite' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'digital-agency-lite' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( DIGITAL_AGENCY_LITE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'digital-agency-lite' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'digital-agency-lite'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'digital-agency-lite'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'digital-agency-lite'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'digital-agency-lite'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'digital-agency-lite'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( DIGITAL_AGENCY_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'digital-agency-lite'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'digital-agency-lite'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'digital-agency-lite'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( DIGITAL_AGENCY_LITE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'digital-agency-lite'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'digital-agency-lite' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','digital-agency-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_services') ); ?>" target="_blank"><?php esc_html_e('Services Section','digital-agency-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Section','digital-agency-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','digital-agency-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','digital-agency-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=digital_agency_lite_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','digital-agency-lite'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','digital-agency-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','digital-agency-lite'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','digital-agency-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','digital-agency-lite'); ?></a>
								</div> 
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','digital-agency-lite'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','digital-agency-lite'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','digital-agency-lite'); ?></span><?php esc_html_e(' Go to ','digital-agency-lite'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','digital-agency-lite'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','digital-agency-lite'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','digital-agency-lite'); ?></span><?php esc_html_e(' Go to ','digital-agency-lite'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','digital-agency-lite'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','digital-agency-lite'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','digital-agency-lite'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-digital-agency/" target="_blank"><?php esc_html_e('Documentation','digital-agency-lite'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Digital_Agency_Lite_Plugin_Activation_Settings::get_instance();
			$digital_agency_lite_actions = $plugin_ins->recommended_actions;
			?>
				<div class="digital-agency-lite-recommended-plugins">
				    <div class="digital-agency-lite-action-list">
				        <?php if ($digital_agency_lite_actions): foreach ($digital_agency_lite_actions as $key => $digital_agency_lite_actionValue): ?>
				                <div class="digital-agency-lite-action" id="<?php echo esc_attr($digital_agency_lite_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($digital_agency_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($digital_agency_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($digital_agency_lite_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','digital-agency-lite'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($digital_agency_lite_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'digital-agency-lite' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','digital-agency-lite'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','digital-agency-lite'); ?></span></b></p>
	              	<div class="digital-agency-lite-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','digital-agency-lite'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

              	<div class="block-pattern-link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'digital-agency-lite' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','digital-agency-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','digital-agency-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','digital-agency-lite'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','digital-agency-lite'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','digital-agency-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','digital-agency-lite'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','digital-agency-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','digital-agency-lite'); ?></a>
								</div> 
							</div>
						</div>
				</div>					
	        </div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Digital_Agency_Lite_Plugin_Activation_Settings::get_instance();
			$digital_agency_lite_actions = $plugin_ins->recommended_actions;
			?>
				<div class="digital-agency-lite-recommended-plugins">
				    <div class="digital-agency-lite-action-list">
				        <?php if ($digital_agency_lite_actions): foreach ($digital_agency_lite_actions as $key => $digital_agency_lite_actionValue): ?>
				                <div class="digital-agency-lite-action" id="<?php echo esc_attr($digital_agency_lite_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($digital_agency_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($digital_agency_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($digital_agency_lite_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'digital-agency-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="digital-agency-lite-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','digital-agency-lite'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
						<h3><?php esc_html_e( 'Link to customizer', 'digital-agency-lite' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','digital-agency-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','digital-agency-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','digital-agency-lite'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','digital-agency-lite'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','digital-agency-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','digital-agency-lite'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=digital_agency_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','digital-agency-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','digital-agency-lite'); ?></a>
								</div> 
							</div>
						</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = Digital_Agency_Lite_Plugin_Activation_Woo_Products::get_instance();
				$digital_agency_lite_actions = $plugin_ins->recommended_actions;
				?>
				<div class="digital-agency-lite-recommended-plugins">
					    <div class="digital-agency-lite-action-list">
					        <?php if ($digital_agency_lite_actions): foreach ($digital_agency_lite_actions as $key => $digital_agency_lite_actionValue): ?>
					                <div class="digital-agency-lite-action" id="<?php echo esc_attr($digital_agency_lite_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($digital_agency_lite_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($digital_agency_lite_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($digital_agency_lite_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'digital-agency-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="digital-agency-lite-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','digital-agency-lite'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','digital-agency-lite'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','digital-agency-lite'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','digital-agency-lite'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','digital-agency-lite'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','digital-agency-lite'); ?></span></b></p>
	              	<div class="digital-agency-lite-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','digital-agency-lite'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','digital-agency-lite'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'digital-agency-lite' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Digital marketing WordPress theme is a premium theme with its user-friendly interface and resourceful features it can craft your website to a new level. It comes with a polished toolset for the webmasters of various levels of experience. This premium theme comes with a spectrum of applications as well as website archetypes. It is a modern as well as intuitive theme and features visual customization process with advanced admin panel settings. Digital marketing WordPress theme has innumerable customization settings and elements and this also includes visual composer page builder plugin. It also has the unique page templates apart from creative layouts as well as exotic image galleries. It is a good theme for opening a website related to the business of website development or internet marketing business. The theme has WooCommerce plugin suite for the online digital marketing agency.','digital-agency-lite'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( DIGITAL_AGENCY_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'digital-agency-lite'); ?></a>
					<a href="<?php echo esc_url( DIGITAL_AGENCY_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'digital-agency-lite'); ?></a>
					<a href="<?php echo esc_url( DIGITAL_AGENCY_LITE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'digital-agency-lite'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'digital-agency-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'digital-agency-lite'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'digital-agency-lite'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'digital-agency-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'digital-agency-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'digital-agency-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'digital-agency-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'digital-agency-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'digital-agency-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'digital-agency-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'digital-agency-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'digital-agency-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'digital-agency-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'digital-agency-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('14', 'digital-agency-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'digital-agency-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'digital-agency-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'digital-agency-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'digital-agency-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'digital-agency-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'digital-agency-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'digital-agency-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( DIGITAL_AGENCY_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'digital-agency-lite'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'digital-agency-lite'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'digital-agency-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( DIGITAL_AGENCY_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'digital-agency-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'digital-agency-lite'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'digital-agency-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( DIGITAL_AGENCY_LITE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'digital-agency-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'digital-agency-lite'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'digital-agency-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( DIGITAL_AGENCY_LITE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'digital-agency-lite'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'digital-agency-lite'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'digital-agency-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( DIGITAL_AGENCY_LITE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','digital-agency-lite'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'digital-agency-lite'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'digital-agency-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( DIGITAL_AGENCY_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'digital-agency-lite'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>