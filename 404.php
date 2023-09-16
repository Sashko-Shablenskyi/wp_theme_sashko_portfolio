<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Sashko_Sh
 */

get_header();
?>

	<section class="does-not-exist">
		<div class="eyes">
			<div class="eyes__eye eyes__left"></div>
			<div class="eyes__eye eyes__right"></div>
		</div>

		<h1 class="does-not-exist__title">404</h1>
		<h2 class="does-not-exist__subtitle">Got lost? why? how? aaaaa...</h2>
		<a href="<?php echo get_home_url() ?>" class="btn btn--center does-not-exist__btn"> Home </a>
	</section>

<?php
get_footer();
