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
<!-- Header -->
        <div id="rooms-header">
            <div id="home-header" style="background: url('<?php the_field('clients_background', 'option'); ?>') fixed;">
                <div class="header-content-bg">
                </div>
                <div class="header-content" style="border-bottom: white 3px solid;">
                    <h1><span>Clients</span></h1> 
                    <p class="wide-paragraph"><?php the_field('clients_text', 'option'); ?></p>
                </div>
            </div>
        </div>

            
<!-- Start the Loop. -->
            <div class="client-list">
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 	<!-- Test if the current post is in category 3. -->
 	<!-- If it is, the div box is given the CSS class "post-cat-three". -->
 	<!-- Otherwise, the div box is given the CSS class "post". -->

 	<?php if ( in_category( 'clients' ) ) : ?>
                <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
 	<?php endif; ?>
 	<!-- Stop The Loop (but note the "else:" - see next line). -->
 <?php endwhile; else : ?>
 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
 	<!-- REALLY stop The Loop. -->
 <?php endif; ?>
            </div>
                <div class="right-content">
                    <div class="band-banner" style="width: 100%;">
                        <img src="<?php the_field('client_image'); ?>">
                    </div>
                    <div class="band-content">
                        CONTENT
                    </div>
                </div>
                
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
