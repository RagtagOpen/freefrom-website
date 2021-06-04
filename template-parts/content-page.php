<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FreeFrom
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php freefrom_post_thumbnail(); ?>

	<header class="entry-header width-wrapper">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content width-wrapper">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
