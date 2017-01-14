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
                <div class="header-content" style="border-bottom: white 3px solid;">
                    <h1><span><?php the_title(); ?></span></h1> 
                    <p class="wide-paragraph"><?php the_field('rooms_text'); ?></p>
                </div>
            </div>
        </div>
<!-- Room Panels -->
            <div class="outer" style="height: 300px; background: url('<?php the_field('slate_image'); ?>'); border-top:0px; background-position: center; background-size: cover;">
                <div class="inner" style="height: 300px;">
                    <div class="inner-content">
                        <h2>Slate Room</h2>
                        <p><?php the_field('slate_text'); ?></p>
                        <a class="ghostCTA" href="../studios/slate">Find out more</a>
                    </div>    
                </div>
            </div>
            <div class="outer" style="height: 300px; background: url('<?php the_field('cork_image'); ?>'); border-top:0px; background-position: center; background-size: cover;">
                <div class="inner" style="height: 300px;">
                    <div class="inner-content">
                        <h2>Cork Room</h2>
                        <p><?php the_field('cork_text'); ?></p>
                        <a class="ghostCTA" href="../studios/slate">Find out more</a>
                    </div>    
                </div>
            </div>
            <div class="outer" style="height: 300px; background: url('<?php the_field('control_image'); ?>'); border-top:0px; background-position: center; background-size: cover;">
                <div class="inner" style="height: 300px;">
                    <div class="inner-content">
                        <h2>Control Room</h2>
                        <p><?php the_field('control_text'); ?></p>
                        <a class="ghostCTA" href="../studios/slate">Find out more</a>
                    </div>    
                </div>
            </div>
            <div class="outer" style="height: 300px; background: url('<?php the_field('control_image'); ?>'); border-top:0px; background-position: center; background-size: cover;">
                <div class="inner" style="height: 300px;">
                    <div class="inner-content">
                        <h2>Mix Room</h2>
                        <p><?php the_field('control_text'); ?></p>
                        <a class="ghostCTA" href="../studios/slate">Find out more</a>
                    </div>    
                </div>
            </div>
            <div class="outer" style="height: 300px; background: url('<?php the_field('control_image'); ?>'); border-top:0px; background-position: center; background-size: cover;">
                <div class="inner" style="height: 300px;">
                    <div class="inner-content">
                        <h2>Breakout Room</h2>
                        <p><?php the_field('control_text'); ?></p>
                        <a class="ghostCTA" href="../studios/slate">Find out more</a>
                    </div>    
                </div>
            </div>


            
            
            
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
