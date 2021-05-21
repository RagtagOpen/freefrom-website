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
		<div class="footer-content width-wrapper">
			<?php
			$footer_sidebars = array( 'footer-1', 'footer-2', 'footer-3' );
			foreach ( $footer_sidebars as $sidebar ) {
				if ( is_active_sidebar( $sidebar ) ) {
					echo '<div class="' . $sidebar . '">';
					dynamic_sidebar( $sidebar );
					echo '</div>';
				}
			}
			?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
