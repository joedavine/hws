<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HWS_-_EQBA
 */

get_header(); ?>

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'home', get_post_format() );

            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	           $bgimage = the_post_thumbnail_url();
            }

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<!-- Header Section --> 
            <div id="home-header" style="background: url('<?php the_field('homepage_banner'); ?>') fixed;">
                <div class="header-content-bg">
                </div>
                <div class="header-content" style="padding-top: 80px; text-align:center;">
                    <h1><?php the_field('banner_heading'); ?><br><span><?php the_field('banner_strong'); ?></span></h1>
                    <p><?php the_field('header_description'); ?></p>
                    <a href="/contact" class="CTA">Get in touch</a>
                </div>
            </div>
<!-- Services Section -->            
        <div id="services">
            <h2>Services</h2>
            <div class="cards">
                <div class="card first-card">
                    <img src="<?php the_field('recording_image'); ?>" alt="Avatar" style="width:100%">
                    <div class="card-container center-text">
                        <h4 class="CTA"><b>Recording</b></h4> 
                        <p><?php the_field('recording_text'); ?></p> 
                    </div>
                </div>
                <div class="card middle-card">
                    <img src="<?php the_field('rehearsal_image'); ?>" alt="Avatar" style="width:100%">
                    <div class="card-container">
                        <h4 class="CTA"><b>Rehearsal</b></h4> 
                        <p><?php the_field('rehearsal_text'); ?></p> 
                    </div>
                </div>
                <div class="card last-card">
                    <img src="<?php the_field('residency_image'); ?>" alt="Avatar" style="width:100%">
                    <div class="card-container">
                        <h4 class="CTA"><b>Residency</b></h4> 
                        <p><?php the_field('residency_text'); ?></p> 
                    </div>
                </div>
            </div>
        </div>
<!-- About Section -->              
        <div id="about-us">
            <h2>About The Studio</h2>
            <div class="about-container">
                <p><?php the_field('about_text'); ?></p>
                <a href="/engineers" class="CTA" style="background-color: transparent;">See Our Engineers</a>
            </div>
            
        </div>
               
<!-- Latest Stuff Section -->
        <?php get_template_part( 'social' );           // Social Section (social.php) ?>
		</main><!-- #main -->
	</div><!-- #primary -->




<?php
get_sidebar();
get_footer();
