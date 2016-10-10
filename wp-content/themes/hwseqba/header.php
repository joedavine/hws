<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HWS_-_EQBA
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="font-family: 'Lato', sans-serif;">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hws-eqba' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<span class="nav-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><!--<?php bloginfo( 'name' ); ?>-->HWS</a></span>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="logo-image" src="/wp-content/uploads/2016/09/hws-logo.png"></a>
			<?php
			endif;

            $description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<!--<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>-->
			<?php
			endif; ?>
		
        
        </div><!-- .site-branding -->
        <div style="background-color: white; height:60px">
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'hws-eqba' ); ?></button>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </nav><!-- #site-navigation -->
                    <div class="git-button">
                <a href="#">Get in touch.</a>
            </div>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
