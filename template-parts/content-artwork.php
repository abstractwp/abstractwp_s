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
			the_post_thumbnail( 'full', [ 'class' => 'artwork-img' ] );
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
