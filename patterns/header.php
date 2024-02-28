<?php
/**
 * Title: Header - Default
 * Slug: wds/header-default
 * Categories: header
 * Block Types: core/template-part/header
 *
 * @package wd_s
 */

// Determine whether to display site logo or site title.
$wds_site_logo = has_custom_logo() ? '<!-- wp:site-logo /-->' : '<!-- wp:site-title /-->';
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
	<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center is-not-stacked-on-mobile">
		<!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">
			<?php echo wp_kses_post( $wds_site_logo ); ?>
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"70%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%">
			<!-- wp:navigation {"layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right"}} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
