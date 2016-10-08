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
		<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post();

			// get_template_part( 'template-parts/content', get_post_format() );

			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
<!-- Header -->
        <div id="rooms-header">
            <div id="home-header" style="background: url('<?php the_field('rooms_banner'); ?>') fixed;">
                <div class="header-content-bg">
                </div>
                <div class="header-content">
                    <h1><span>Rooms</span></h1> 
                    <p class="wide-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.</p>
                </div>
            </div>
        </div>
<!-- Room Panels -->
            <div class="overlay room-panel" style="background: url('<?php the_field('rooms_banner'); ?>');">
                <div class="panel-content">
                    <h2>Slate Room</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.</p>
                    <a class="ghostCTA" href="../slate">Find out more</a>
                </div>
            </div>
            <div class="overlay room-panel" style="background: url('<?php the_field('rooms_banner'); ?>');">
                <div class="panel-content">
                    <h2>Cork Room</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.</p>
                    <a class="ghostCTA" href="/slate">Find out more</a>
                </div>
            </div>
            <div class="overlay room-panel" style="background: url('<?php the_field('rooms_banner'); ?>');">
                <div class="panel-content">
                    <h2>Control Room</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.</p>
                    <a class="ghostCTA" href="/slate">Find out more</a>
                </div>
            </div>


            
            
            
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
