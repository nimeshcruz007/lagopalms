<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header( );

$id          = get_the_ID();
$title       = get_the_title();

$avatar      = get_post_meta( $id, 'ova_team_met_avatar', true );

if ( $avatar == '') {
    $avatar  =  \Elementor\Utils::get_placeholder_image_src();
}

$job         	= get_post_meta( $id, 'ova_team_met_job', true );
$list_social 	= get_post_meta( $id, 'ova_team_met_group_icon', true );

//Title _ bio
$title_bio 		= get_post_meta($id, 'ova_team_met_title_bio', true);
$biography     	= get_post_meta( $id, 'ova_team_met_biography', true );
?>

<div class="row_site">
	<div class="container_site">

		<div class="ova_team_single">

			<div class="info">

				<!-- Image -->
				<div class="img">
					
					<?php if( ! empty( $avatar ) ){ ?>
						<img src="<?php echo esc_url( $avatar ); ?>" class="img-responsive" alt="<?php echo get_the_title(); ?>">
					<?php } ?>
				</div>

				<div class="main_content">
					

					<div class="infobox">
						<h2 class="name">
							<?php echo get_the_title(); ?>
						</h2>
						<?php if( ! empty( $job ) ) { ?>
							<div class="job content-contact">
								
								<?php echo esc_html( $job ); ?>
							</div>
						<?php } ?>
					</div>
						
					<!-- meta-->
					<div class="meta">
						
						<?php if( !empty( $list_social ) ) : ?>

							<div class="box-list-icon"> 
								<?php
									foreach( $list_social as $social ){

										$class_icon = isset( $social['ova_team_met_class_icon_social'] ) ? $social['ova_team_met_class_icon_social'] : '';
										$link_social = isset( $social['ova_team_met_link_social'] ) ? $social['ova_team_met_link_social'] : '';
										
										?>
										<?php if($link_social && $class_icon): ?>
										
											<a href="<?php echo esc_url( $link_social ); ?>"  class="item" >
												<i class="<?php echo esc_attr( $class_icon ) ?>"></i>
											</a>
										
										<?php endif; ?>
								<?php } ?>
								
							</div>
							
						<?php endif; ?>
						
					</div>

					<!-- // bio -->
					<div class="bio">
						<h4 class="bio-title">
							<?php echo esc_html($title_bio); ?>
						</h4>
						<p class="bio-single">
							<?php echo esc_html($biography); ?>
						</p>
					</div>

				</div>

			</div>

		</div>

	</div>
</div>

<div class="description">
	<?php if( have_posts() ) : while( have_posts() ) : the_post();
		the_content();
		?>
		<?php endwhile; endif; wp_reset_postdata(); ?>
</div>

<?php get_footer( );
