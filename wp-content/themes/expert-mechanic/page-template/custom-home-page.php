<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'expert_mechanic_above_slider' ); ?>

	<?php if( get_theme_mod('expert_mechanic_slider_hide_show') != ''){ ?>
		<section id="slider">
		  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
			    <?php $expert_mechanic_slider_pages = array();
		      	for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'expert_mechanic_slider' . $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $expert_mechanic_slider_pages[] = $mod;
			        }
		      	}
		      	if( !empty($expert_mechanic_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $expert_mechanic_slider_pages,
			          	'orderby' => 'post__in'
			        );
			        $query = new WP_Query( $args );
			        if ( $query->have_posts() ) :
			          $i = 1;
			    ?>     
				    <div class="carousel-inner" role="listbox">
				      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
					        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
					          	<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?> "/>
					          	<div class="carousel-caption">
						            <div class="inner_carousel">
						              	<h2><?php the_title();?></h2>
						              	<p><?php $expert_mechanic_excerpt = get_the_excerpt(); echo esc_html( expert_mechanic_string_limit_words( $expert_mechanic_excerpt,15 ) ); ?></p>
						            </div>
						            <div class="read-btn">
					            		<a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','expert-mechanic'); ?><span class="screen-reader-text"><?php esc_html_e('READ MORE','expert-mechanic'); ?></span></a>
							       	</div>
					          	</div>
					        </div>
				      	<?php $i++; endwhile; 
				      	wp_reset_postdata();?>
				    </div>
			    <?php else : ?>
			    	<div class="no-postfound"></div>
	      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
			        <span class="screen-reader-text"><?php esc_html_e( 'Prev','expert-mechanic' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
			        <span class="screen-reader-text"><?php esc_html_e( 'Next','expert-mechanic' );?></span>
			    </a>
		  	</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('expert_mechanic_below_slider'); ?>

	<?php /*--- Our services ---*/ ?>
	<?php if( get_theme_mod('expert_mechanic_services_title') != '' || get_theme_mod( 'expert_mechanic_services_cat' )!= ''){ ?>
		<section id="our_service">
			<div class="container">
				<div class="services-head">
					<?php if( get_theme_mod('expert_mechanic_services_title') != ''){ ?>
						<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/setting.png'); ?>" class="title-img">
			        	<h2><?php echo esc_html(get_theme_mod('expert_mechanic_services_title','')); ?></h2>
			        	<hr>
			        <?php }?>
			    </div>
		    </div>
		    <div class="services">
				<div class="container">
					<div class="row">
						<?php $expert_mechanic_catData1=  get_theme_mod('expert_mechanic_services_cat'); 
						if($expert_mechanic_catData1){ 
				  			$args = array(
								'post_type' => 'post',
								'category_name' => esc_html($expert_mechanic_catData1 ,'expert-mechanic')
					        );
			      		$expert_mechanic_page_query = new WP_Query($args);?>
			      		<?php $counter = 1; ?>
						<?php while( $expert_mechanic_page_query->have_posts() ) : $expert_mechanic_page_query->the_post(); ?>
							<div class="col-lg-4 col-md-6">
								<div class="services-box post-list-<?php echo esc_html( expert_mechanic_odd_or_even($counter)); ?>">
									<div class="servicesbox-img">
										<?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?>
										<?php } ?>
									</div>
									<div class="service-content">
								      	<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
							       	</div>
							    </div>
							</div>
							<?php $counter++; ?>
				  		<?php endwhile; 
				      	wp_reset_postdata();
				      	}?>
			        </div>
				</div>
			</div>
		</section>
	<?php }?>

	<?php do_action('expert_mechanic_below_services_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	        <?php the_content(); ?>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>