<?php
/**
 * Title: Testimonials image
 * Slug: wds/testimonials-image
 * Categories: wds-testimonial
 *
 * @package wd_s
 */

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"},"margin":{"top":"0","bottom":"0"}}},"className":"testimonial-image","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull testimonial-image" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)"><!-- wp:heading {"textAlign":"center","level":5} -->
<h5 class="wp-block-heading has-text-align-center">Testimonials</h5>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Testimonials Section Headline Goes Here</h2>
<!-- /wp:heading -->

<!-- wp:columns {"verticalAlignment":null,"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--70)"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":78,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/media.jpg" alt="" class="wp-image-78"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:wds/testimonial {"name":"wds/testimonial","data":{"style":"simple","_style":"field_65782b006f352","testimonials_0_author":"John Smith","_testimonials_0_author":"field_64ebfedfaed14","testimonials_0_job_title":"Ceo of Company","_testimonials_0_job_title":"field_64ebff19aed16","testimonials_0_content":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu tincidunt libero. Vivamus odio est, malesuada eu sapien id, scelerisque vehicula lacus. Pellentesque pretium viverra lorem, sed iaculis ex feugiat non.\r\n","_testimonials_0_content":"field_64ebfef6aed15","testimonials_0_avatar":109,"_testimonials_0_avatar":"field_64f95ca1482b4","testimonials_0_rating":"5","_testimonials_0_rating":"field_65782491f1d1e","testimonials":1,"_testimonials":"field_60978d67b0fad"},"mode":"preview"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
