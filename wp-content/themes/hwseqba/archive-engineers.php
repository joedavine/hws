<?php
/**
 * The template for displaying the engineer page.
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
            <div id="home-header" style="background: url('<?php the_field('engineers_background', 'option'); ?>') fixed; background-size: cover; background-position: center;">
                <div class="header-content-bg">
                </div>
                <div class="header-content">
                    <h1><span>Engineers</span></h1>
                    <p class="wide-paragraph"><?php the_field('engineers_text', 'option'); ?></p>
                </div>
            </div>
        </div>


<!-- Start the Loop. -->
        <div id="engineers">
            <div class="engineers-container">
            <?php query_posts('post_type=engineers');
                if(have_posts()) : while(have_posts()) : the_post(); ?>
            <div class="engineer-single card">
                <div style="height: 250px !important; background-image: url(<?php the_field('engineer_image'); ?>); background-size: cover; background-position: center;">
                    <span>&#32;</span>
                </div>
                <h2 class="cta">
                            <!--<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">--><?php the_title(); ?><!--</a>-->
                        </h2>
                    <p><?php the_field('brief_bio'); ?></p>
										<a href="<?php the_permalink();?>" class="CTA">Read more</a>
            </div>
                <?php endwhile; endif; ?>
        </div>
         </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
