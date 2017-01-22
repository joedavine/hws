<?php
/**
 * The template for displaying the contact page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HWS_-_EQBA
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main" style="margin-top:60px;">

<!-- Container -->
            <div id="contact">
<!-- First Half -->
                <div class="contact-left-container">
                    <div class="contact-left">
                        <h2>Contact</h2>
                        <p style="font-weight: 200;"><?php the_field('contact_text', 'option'); ?></p>
                        <ul class="contact-details" style="padding: 0; list-style-type: none; font-weight:200;">
                            <li style="list-style-type: none;"><img src="/wp-content/uploads/2017/01/email-1.png"><a href="mailto:<?php the_field('contact_email', 'option') ?>"><?php the_field('contact_email', 'option') ?></a></li>
                            <li style="list-style-type: none;"><img src="/wp-content/uploads/2017/01/phone-1.png"> <?php the_field('contact_telephone', 'option') ?></li>
                            <li style="list-style-type: none;"><img style="float: left;"src="/wp-content/uploads/2017/01/location.png">
                                <div style="float: left">
                                    <?php the_field('contact_address', 'option') ?>
                                </div>
                            </li>
                        </ul>
                        <?php get_template_part( 'small-social-white' );           // Social Section (social.php) ?>
                    </div>
                </div>
<!--Second Half -->
                <div class="contact-right-container" style="width: 50%; float: left; height: 100%;">
                <div id="map"></div>
                <script>

                    marker.setMap(map);
                    function initMap() {
                        var uluru = {lat: 51.5750496, lng: -0.0931808};
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 14,
                            center: uluru
                        });

                          var image = {
												    url: 'http://hermitageworksstudios.com/wp-content/uploads/2016/10/marker.png',
												    // This marker is 20 pixels wide by 32 pixels high.
												    size: new google.maps.Size(71, 97),
												    // The anchor for this image is the base of the flagpole at (0, 64).
												    anchor: new google.maps.Point(0, 97)
												  };
                        var marker = new google.maps.Marker({
                            position: uluru,
                            icon: image,
                            map: map
                        });
                    }
                </script>
                <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfgPvq97pgH79VutQ9DoGSMuWmUk_B8cQ&callback=initMap">
                </script>
                </div>
            </div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
