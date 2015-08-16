<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package primebase
 */

get_header(); ?>
 	<div class="container">
    <div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">
        <?php if ( have_posts() ) : ?>
          <?php woocommerce_content(); ?>
        <?php endif; ?>

      </main><!-- #main -->
    </div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div><!-- .container -->
<?php get_footer(); ?>
