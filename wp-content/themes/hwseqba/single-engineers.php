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
        <div id="rooms-header">
            <div id="home-header" style="background: url('<?php the_field('clients_background', 'option'); ?>') fixed;">
                <div class="header-content-bg">
                </div>
                <div class="header-content" style="border-bottom: white 3px solid;">
                    <h1><span><?php the_title(); ?></span></h1>
                    <p class="wide-paragraph"><?php the_field('brief_bio'); ?></p>
                </div>
            </div>
        </div>


<!-- Start the Loop. -->
			<div class="engineers-container">
				<div class="card">
					<div class="column-left">
          	<img src="<?php the_field('engineer_image'); ?>">
					</div>
					<div class="column-right">
						<?php the_content() ?>
					</div>
				</div>
			</div>
			<?php wp_reset_query(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
