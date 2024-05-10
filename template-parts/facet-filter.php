<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wd_s
 */

echo '<div class="facet-filter flex items-center">';
echo '<h5 class="filter-label">' . esc_html__( 'Filter by ', 'wd_s' ) . '</h5>';
echo do_shortcode( '[facetwp facet="artwork_category"]' );
echo do_shortcode( '[facetwp facet="subjects"]' );
echo '</div>';
