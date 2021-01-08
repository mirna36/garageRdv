<?php
/**
 * The header for our theme
 *
 * @subpackage Expert Mechanic
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'expert-mechanic' ); ?></a>

<div class="header-box">
	<div class="row">
		<div class="offset-lg-1 offset-md-1 col-lg-2 col-md-3">
			<div class="logo">
				<?php if ( has_custom_logo() ) : ?>
            		<?php the_custom_logo(); ?>
	            <?php endif; ?>
              	<?php $blog_info = get_bloginfo( 'name' ); ?>
	                <?php if ( ! empty( $blog_info ) ) : ?>
	                  	<?php if ( is_front_page() && is_home() ) : ?>
	                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	                  	<?php else : ?>
                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  		<?php endif; ?>
	                <?php endif; ?>
	                <?php
                  		$description = get_bloginfo( 'description', 'display' );
	                  	if ( $description || is_customize_preview() ) :
	                ?>
                  	<p class="site-description">
                    	<?php echo esc_html($description); ?>
                  	</p>
              	<?php endif; ?>
		    </div>
		</div>
		<div class="col-lg-9 col-md-8">
			<div class="top-header">
				<div class="container">
					<div class="row">
						<div class="offset-lg-1 col-lg-6 col-md-7">
							<?php if(get_theme_mod('expert_mechanic_email') != '') { ?>
								<span class="email"><a href="mailto:<?php echo esc_url(get_theme_mod('expert_mechanic_email')); ?>"><?php echo esc_html(get_theme_mod('expert_mechanic_email')); ?></a></span>
							<?php } ?>
							<?php if(get_theme_mod('expert_mechanic_call') != '') { ?>
								<span class="call"><a href="tel:<?php echo esc_url(get_theme_mod('expert_mechanic_call')); ?>"><?php echo esc_html(get_theme_mod('expert_mechanic_call')); ?></a></span>
							<?php } ?>
						</div>
						<div class="col-lg-5 col-md-5">
							<div class="social-icon">
								<?php if(get_theme_mod('expert_mechanic_facebook') != '') { ?>
									<a href="<?php echo esc_url(get_theme_mod('expert_mechanic_facebook')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_html_e('Facebook', 'expert-mechanic'); ?></span></a>
								<?php }?>
								<?php if(get_theme_mod('expert_mechanic_twitter') != '') { ?>
									<a href="<?php echo esc_url(get_theme_mod('expert_mechanic_twitter')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_html_e('Twitter', 'expert-mechanic'); ?></span></a>
								<?php }?>
								<?php if(get_theme_mod('expert_mechanic_pinterest') != '') { ?>
									<a href="<?php echo esc_url(get_theme_mod('expert_mechanic_pinterest')); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php esc_html_e('Pinterest', 'expert-mechanic'); ?></span></a>
								<?php }?>
								<?php if(get_theme_mod('expert_mechanic_instagram') != '') { ?>
									<a href="<?php echo esc_url(get_theme_mod('expert_mechanic_instagram')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e('Instagram', 'expert-mechanic'); ?></span></a>
								<?php }?>
								<?php if(get_theme_mod('expert_mechanic_youtube') != '') { ?>
									<a href="<?php echo esc_url(get_theme_mod('expert_mechanic_youtube')); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_html_e('Youtube', 'expert-mechanic'); ?></span></a>
								<?php }?>
								<?php if(get_theme_mod('expert_mechanic_linkedin') != '') { ?>
									<a href="<?php echo esc_url(get_theme_mod('expert_mechanic_linkedin')); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_html_e('Linkedin', 'expert-mechanic'); ?></span></a>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="header">
				<div class="header-clip">
					<div class="container">
						<div class="row m-0">
							<div class="col-lg-8 col-md-5 col-6">
								<div class="menu-section">
									<div class="toggle-menu responsive-menu">
							            <button onclick="expert_mechanic_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','expert-mechanic'); ?></span></button>
							        </div>
									<div id="sidelong-menu" class="nav sidenav">
						                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'expert-mechanic' ); ?>">
						                  	<?php
							                    wp_nav_menu( array( 
													'theme_location' => 'primary',
													'container_class' => 'main-menu-navigation clearfix' ,
													'menu_class' => 'clearfix',
													'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
													'fallback_cb' => 'wp_page_menu',
							                    ) ); 
						                  	?>
						                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="expert_mechanic_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','expert-mechanic'); ?></span></a>
						                </nav>
						            </div>
						        </div>
						    </div>
						    <div class="col-lg-1 col-md-2 col-6">
						    	<?php if(class_exists('woocommerce')){ ?>
						    		<a class="cart-icon" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="fas fa-shopping-cart"></i></a>
						    	<?php }?>
						    </div>
						    <div class="col-lg-3 col-md-5">
						    	<?php if(get_theme_mod('expert_mechanic_button_link') != '') { ?>
						    		<div class="appointment-btn">
										<a href="<?php echo esc_url(get_theme_mod('expert_mechanic_button_link')); ?>"><?php echo esc_html(get_theme_mod('expert_mechanic_button_text', __('Appointment', 'expert-mechanic'))); ?><span class="screen-reader-text"><?php esc_html_e('Appointment', 'expert-mechanic'); ?></span></a>
									</div>
								<?php }?>
						    </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>