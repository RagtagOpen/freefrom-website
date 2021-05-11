<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FreeFrom
 */

?>

	<footer id="colophon" class="site-footer">
		<?php
		if ( is_active_sidebar( 'footer-1' ) ) {
			dynamic_sidebar( 'footer-1' );;
		}
		if ( is_active_sidebar( 'footer-2' ) ) {
			dynamic_sidebar( 'footer-2' );;
		}
		if ( is_active_sidebar( 'footer-3' ) ) {
			dynamic_sidebar( 'footer-3' );;
		}
		?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
