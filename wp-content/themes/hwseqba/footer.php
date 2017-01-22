<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HWS_-_EQBA
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info" style="width: 100%;">
			<span class="footer-text">&#169; <?php echo date("Y"); ?> - Hermitage Works Studios</span>

            <div class="footer-container">
                <img class="footer-image" src="/wp-content/uploads/2016/09/hws-small.png">
            </div>

            <a href="http://eqba.uk">
                <img class="footer-logo" id="imgDino" src="/wp-content/uploads/2016/09/eqba-logo-black-1.png"></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
<!-- Animated Hover -->
    <script>
        $(function() {
            $("#imgDino").hover(
                function() {
                    $(this).attr("src", "/wp-content/uploads/2016/09/EQBA_animated_white.gif");
                },
                function() {
                    $(this).attr("src", "/wp-content/uploads/2016/09/eqba-logo-black-1.png");
                }
            );
        });
    </script>
</html>
