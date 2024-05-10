<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wd_s
 */

?>

<article <?php post_class( 'post-container artwork-container' ); ?>>

	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'full', [ 'class' => 'artwork-img' ] );
			else :
				$wd_s_colors = [ 'primary-100', 'primary-200', 'primary-300', 'primary-400', 'secondary-100', 'secondary-200', 'secondary-300', 'secondary-400', 'neutral-100', 'neutral-200', 'neutral-300', 'neutral-400' ];
				echo '<div class="placeholder-img pbg-' . $wd_s_colors[ array_rand( $wd_s_colors )] . '"></div>'; // phpcs:ignore.
			endif;
		endif;
		?>
	</header><!-- .entry-header -->


	<?php
	if ( is_single() ) :
		echo '<div class="entry-content">';
			the_content();
		echo '</div>';
	endif;
	?>

</article><!-- #post-## -->
