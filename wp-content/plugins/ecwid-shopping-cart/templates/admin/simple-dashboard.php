<div class="wrap ecwid-admin ecwid-dashboard">
	<div class="ec-store-box">
		<div class="head">
			<?php
			if ( ! Ecwid_Config::is_wl() ) {
				ecwid_embed_svg( 'ecwid-logo-blue' );
			}
			?>
			<h3>
				<?php echo esc_html( sprintf( __( '%s Shopping Cart', 'ecwid-shopping-cart' ), Ecwid_Config::get_brand() ) ); ?>
			</h3>
			<div class="store-id drop-down">
					<span>
						<?php esc_html_e( 'Store ID', 'ecwid-shopping-cart' ); ?> : <?php echo esc_html( get_ecwid_store_id() ); ?>
					</span>
				<ul>
					<li>
						<a href="admin.php?page=ec-store&reconnect"><?php esc_html_e( 'Disconnect store', 'ecwid-shopping-cart' ); ?></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="body">
			<div class="greeting-image">
				<img src="<?php echo esc_attr( ECWID_PLUGIN_URL ); ?>/images/store_ready.png" width="142" />
			</div>

			<div class="greeting">
			<?php if ( isset( $_GET['settings-updated'] ) ) : ?>
				<div class="greeting-title">
					<?php esc_html_e( 'Congratulations!', 'ecwid-shopping-cart' ); ?>
				</div>
				<div class="greeting-message mobile-br">
					<?php echo wp_kses_post( sprintf( __( 'Your %s store is now connected<br /> to your WordPress website', 'ecwid-shopping-cart' ), Ecwid_Config::get_brand() ) ); ?>
				</div>
			<?php else : ?>

				<div class="greeting-title">
					<?php esc_html_e( 'Greetings!', 'ecwid-shopping-cart' ); ?>
				</div>
				<div class="greeting-message mobile-br">
					<?php echo wp_kses_post( sprintf( __( 'Your %s store is connected<br /> to your WordPress website', 'ecwid-shopping-cart' ), Ecwid_Config::get_brand() ) ); ?>
				</div>
			<?php endif; ?>

			<ul class="greeting-links">
				<li>
					<a target="_blank" href="<?php echo esc_url( Ecwid_Store_Page::get_store_url() ); ?>"><?php esc_html_e( 'Visit storefront', 'ecwid-shopping-cart' ); ?></a>
				</li>
				<li>
					<a target="_blank" 
					   <?php if ( Ecwid_Api_V3::is_available() && ecwid_get_admin_sso_url( time(), '' ) ) : ?>
					   href="admin-post.php?action=ecwid-do-sso"
					   <?php else : ?>
					   href="<?php echo esc_url( 'https://' . Ecwid_Config::get_cpanel_domain() ); ?>/cp"
					   <?php endif; ?>
					
					><?php esc_html_e( 'Open control panel', 'ecwid-shopping-cart' ); ?></a>
				</li>
			</ul>

			</div>
		</div>
	</div>

	<?php require ECWID_PLUGIN_DIR . 'templates/admin-footer.php'; ?>
</div>
