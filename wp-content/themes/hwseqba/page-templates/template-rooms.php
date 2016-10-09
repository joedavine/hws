<?php /* Template Name: Rooms Template */ ?>
<?php
/**
 * The template for displaying all single rooms.
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
            <div id="home-header" style="background: url('<?php 
$post_id = false; // current post
the_field('single_room_banner', $post_id); ?>') fixed;">
                <div class="header-content-bg">
                </div>
                <div class="header-content">
                    <?php wp_nav_menu( array( 'theme_location' => 'rooms-menu', 'container_class' => 'rooms-menu' ) ); ?>
                    <h1><span><?php the_title(); ?> Room</span></h1> 
                    <p class="wide-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.</p>
                </div>
            </div>
        </div>
        <div>
            <?php 
    echo do_shortcode("[metaslider id=83]"); 
?>
        </div>
        <?php get_template_part( 'social' );           // Social Section (social.php) ?> 
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
