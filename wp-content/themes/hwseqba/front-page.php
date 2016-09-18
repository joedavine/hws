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

            <div id="home-header" style="background: url('/wp-content/uploads/2016/09/hws-bg-1.jpg') fixed;">
                <div class="header-content-bg">
                </div>
                <div class="header-content" style="padding-top: 80px; text-align:center;">
                    <h1>We'll make you sound<br><span>Fucking Epic</span></h1>
                    <p>Professional recording and rehearsal studio in North London. Manor House vibes.</p>
                    <a href="#" class="CTA">Get in touch</a>
                </div>
            </div>
            
        <div id="services">
            <h2>Services</h2>

                <div class="cards">
                    <div class="card first-card">
                        <img src="/wp-content/uploads/2016/09/img_avatar.png" alt="Avatar" style="width:100%">
                        <div class="card-container">
                            <h4 class="CTA"><b>Recording</b></h4> 
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.</p> 
                        </div>
                    </div>
                    <div class="card middle-card">
                        <img src="/wp-content/uploads/2016/09/img_avatar.png" alt="Avatar" style="width:100%">
                        <div class="card-container">
                            <h4 class="CTA"><b>Rehearsal</b></h4> 
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.</p> 
                        </div>
                    </div>
                    <div class="card last-card">
                        <img src="/wp-content/uploads/2016/09/img_avatar.png" alt="Avatar" style="width:100%">
                        <div class="card-container">
                            <h4 class="CTA"><b>Residency</b></h4> 
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in finibus nunc.</p> 
                        </div>
                    </div>
                </div>

        </div>
            
        <div id="rooms">
            <h2>rooms</h2>    
        </div> 
            
            

		</main><!-- #main -->
	</div><!-- #primary -->




<?php
get_sidebar();
get_footer();
