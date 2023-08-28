<?php
/**
 * Testimonials coursel Blocks.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wd_s
 */

namespace WebDevStudios\wd_s;

$wd_s_testimonials = get_field( 'testimonials' );
$wd_s_block_title  = get_field( 'title' );

echo '<div class="wp-block-group">';
if ( $wd_s_testimonials ) :
	echo '<h3>' . esc_html( $wd_s_block_title ) . '</h3>';
endif;

if ( $wd_s_testimonials ) :
	echo '<div class="testimonial-slider-container">';
		echo '<div class="testimonial-slider">';
	foreach ( $wd_s_testimonials as $wd_s_testimonial ) :
		?>
			<div class="block-testimonial">
				<div class="testimonial-container">
					<div class="t-description">
						<p><?php echo esc_html( $wd_s_testimonial['content'] ); ?></p>
					</div>
					<div class="t-meta">
						<p class="title"><?php echo esc_html( $wd_s_testimonial['author'] ); ?></p>
						<p class="position"><?php echo esc_html( $wd_s_testimonial['job_title'] ); ?></p>
					</div>
				</div>
			</div>
			<?php
		endforeach;
		echo '</div>';
	echo '</div>';
endif;
echo '</div>';
