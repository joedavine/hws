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
                    <h1><span>Clients</span></h1> 
                    <p class="wide-paragraph"><?php the_field('clients_text', 'option'); ?></p>
                </div>
            </div>
        </div>

            
<!-- Start the Loop. -->
            <div class="client-list">
                <?php query_posts('post_type=clients');
                if(have_posts()) : while(have_posts()) : the_post(); ?>
                    
                    <h3>
                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    </h3>
                <?php endwhile; endif; ?>                
            </div>
                
                <?php wp_reset_query(); ?>
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                <div class="right-content">
                    <div class="band-banner" style="width: 100%; float: right;">
                        <img src="<?php the_field('client_image'); ?>">
                    </div>
                    <div class="band-content">
                        <div class="client-content">
                            <span class="band-badge"><?php the_title(); ?></span>
                            <?php the_content(); ?>
                            <a href="<?php the_field('client_link'); ?>"><?php the_field('client_link'); ?></a>
                        </div>
                        <?php echo $postID; ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>   
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
