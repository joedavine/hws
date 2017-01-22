<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HWS_-_EQBA
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main" style="margin-bottom: -6px;">
<!-- Header -->
        <div id="engineer-header">
            <div id="home-header">
                <div class="header-content">
										<img class="" src="<?php the_field('engineer_image'); ?>">
                    <h1><span><?php the_title(); ?></span></h1>
                    <p class="wide-paragraph"><?php the_field('brief_bio'); ?></p>
                </div>
            </div>
        </div>


<!-- Start the Loop. -->
			<div class="engineers-container">
				<?php the_content() ?>
				<p><a href="<?php the_permalink();?>" class="CTA">Back to engineers</a></p>
			</div>
			<?php wp_reset_query(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
