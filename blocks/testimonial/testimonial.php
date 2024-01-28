<?php
/**
 * Your block render code goes here.
 *
 * @package wd_s
 */

// Add classes to block.
$wds_classes = [];
if ( ! empty( $block['className'] ) ) {
	$wds_classes[] = $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$wds_classes[] = 'align' . $block['align'];
}

$wd_s_select_testimonials = get_field( 'select_testimonials' );

if ( $wd_s_select_testimonials ) {
	foreach ( $wd_s_select_testimonials as $wd_s_key => $wd_s_select_testimonial ) {
		$wd_s_testimonials[ $wd_s_key ]['author']    = $wd_s_select_testimonial->post_title;
		$wd_s_testimonials[ $wd_s_key ]['content']   = $wd_s_select_testimonial->post_content;
		$wd_s_testimonials[ $wd_s_key ]['avatar']    = get_the_post_thumbnail_url( $wd_s_select_testimonial->ID );
		$wd_s_testimonials[ $wd_s_key ]['rating']    = get_field( 'rating', $wd_s_select_testimonial->ID ) ? get_field( 'rating', $wd_s_select_testimonial->ID ) : 0;
		$wd_s_testimonials[ $wd_s_key ]['job_title'] = get_field( 'position', $wd_s_select_testimonial->ID ) ? get_field( 'position', $wd_s_select_testimonial->ID ) : '';
	}
} else {
	$wd_s_testimonials = get_field( 'testimonials' );
}

$wd_s_block_style = get_field( 'style' ) ? get_field( 'style' ) : 'simple';
$wd_s_block_id    = 'tslider' . wp_rand( 1, 100 );

if ( get_query_var( 'testimonials' ) ) {
	$wd_s_testimonials = get_query_var( 'testimonials' );
	if ( count( $wd_s_testimonials ) > 1 ) {
		$wd_s_block_style = 'center-slider';
	}
}

// Add anchor to the block.
$wds_anchor = ( ! empty( $block['anchor'] ) ) ? 'id="' . esc_attr( $block['anchor'] ) . '" ' : '';
?>
<section <?php echo $wds_anchor; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- XSS ?>class="<?php echo esc_attr( implode( ' ', $wds_classes ) ); ?>">
	<?php
	echo '<div class="testimonial-block ' . esc_html( $wd_s_block_style ) . '">';

	if ( $wd_s_testimonials ) :

		echo '<div class="testimonial-slider-container">';
		if ( 'center-slider' === $wd_s_block_style || 'img-text-slider' === $wd_s_block_style ) {
			echo '<div class="slick-prev" id="prev-' . esc_html( $wd_s_block_id ) . '"><svg xmlns="http://www.w3.org/2000/svg" width="67" height="68" viewBox="0 0 67 68" fill="none"><circle cx="33.5" cy="34" r="33.5" fill="#F5F5F5"/><path d="M36.7861 22.8838L37.8077 23.8549C38.012 24.1104 38.012 24.5193 37.8077 24.7237L28.5623 33.9743L37.8077 43.276C38.012 43.4804 38.012 43.8893 37.8077 44.1448L36.7861 45.1159C36.5307 45.3714 36.1732 45.3714 35.9178 45.1159L25.1911 34.4343C24.9868 34.1787 24.9868 33.821 25.1911 33.5654L35.9178 22.8838C36.1732 22.6283 36.5307 22.6283 36.7861 22.8838Z" fill="#DAD6CB"/></svg></div>';
		}
			echo '<div class="testimonial-slider" id="' . esc_html( $wd_s_block_id ) . '">';
		foreach ( $wd_s_testimonials as $wd_s_testimonial ) :
			?>
				<div class="testimonial-item">
					<div class="testimonial-container">
						<div class="t-content">
							<div class="t-description">
							<?php
							if ( 0 != $wd_s_testimonial['rating'] ) { // phpcs:ignore
								$wd_s_testimonial_rating = $wd_s_testimonial['rating'];

								echo '<div class="rating">';

								for ( $wd_s_i = 0; $wd_s_i < $wd_s_testimonial_rating; $wd_s_i++ ) {
									echo '<div class="star star-soild"></div>';
								}
								for ( $wd_s_i = $wd_s_testimonial_rating; $wd_s_i < 5; $wd_s_i++ ) {
									echo '<div class="star star-regular"></div>';
								}

								echo '</div>';
							}
							?>
								<p><?php echo esc_html( wp_strip_all_tags( $wd_s_testimonial['content'] ) ); ?></p>
							</div>
							<div class="t-meta">
								<?php if ( $wd_s_testimonial['avatar'] ) : ?>
								<img src="<?php echo esc_html( $wd_s_testimonial['avatar'] ); ?>" />
								<?php endif; ?>
								<div>
									<p class="author-title"><?php echo esc_html( $wd_s_testimonial['author'] ); ?></p>
									<p class="position sm"><?php echo esc_html( $wd_s_testimonial['job_title'] ); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			endforeach;
			echo '</div>';
		if ( 'center-slider' === $wd_s_block_style || 'img-text-slider' === $wd_s_block_style ) {
			echo '<div class="slick-next" id="next-' . esc_html( $wd_s_block_id ) . '"><svg xmlns="http://www.w3.org/2000/svg" width="67" height="68" viewBox="0 0 67 68" fill="none"><circle cx="33.5" cy="34" r="33.5" fill="#F5F5F5"/><path d="M31.0161 23.3604L30.0383 24.2899C29.8427 24.5345 29.8427 24.9258 30.0383 25.1215L38.8874 33.9756L30.0383 42.8787C29.8427 43.0743 29.8427 43.4657 30.0383 43.7103L31.0161 44.6397C31.2605 44.8843 31.6028 44.8843 31.8472 44.6397L42.1142 34.4159C42.3097 34.1713 42.3097 33.8289 42.1142 33.5843L31.8472 23.3604C31.6028 23.1159 31.2605 23.1159 31.0161 23.3604Z" fill="#DAD6CB"/></svg></div>';
		}
		echo '</div>';
	endif;
	echo '</div>';

	?>
</section>
