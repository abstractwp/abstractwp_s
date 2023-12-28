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

$wds_accordions      = get_field( 'accordions' );
$wds_open_first_item = get_field( 'open_first_item' );
$wds_is_two_columns  = get_field( 'is_two_columns' );

// Add anchor to the block.
$wds_anchor = ( ! empty( $block['anchor'] ) ) ? 'id="' . esc_attr( $block['anchor'] ) . '" ' : '';
?>
<section <?php echo $wds_anchor; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- XSS ?>class="<?php echo esc_attr( implode( ' ', $wds_classes ) ); ?>">
	<?php
	if ( $wds_accordions ) :
		?>
	<div class="accordions">
		<?php
		$wds_i = 1;
		foreach ( $wds_accordions as $wds_accordion ) :

			if ( $wds_is_two_columns && 1 === $wds_i ) {
				echo '<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column">';
			}
			?>
		<div class="accordion-item">
			<h4 class="accordion-title
			<?php
			if ( 1 === $wds_i && $wds_open_first_item ) {
				echo 'open';}
			?>
			">
				<?php echo esc_html( $wds_accordion['title'] ); ?>
			</h4>
			<div class="accordion-content"
			<?php
			if ( 1 === $wds_i && $wds_open_first_item ) {
				echo 'style="display:block"';}
			?>
			>
				<?php echo $wds_accordion['content']; //phpcs:ignore. ?>
			</div>
		</div>
			<?php

			if ( $wds_is_two_columns && ceil( count( $wds_accordions ) / 2 ) == $wds_i ) {  //phpcs:ignore.
				echo '</div>
				<!-- /wp:column --><!-- wp:column -->
				<div class="wp-block-column">
				';
			}

			if ( $wds_is_two_columns && count( $wds_accordions ) === $wds_i ) {
				echo '<!-- /wp:column --></div>
				<!-- /wp:columns --></div>';
			}
			++$wds_i;

		endforeach;
		?>
	</div>
		<?php
	endif;
	?>
</section>
