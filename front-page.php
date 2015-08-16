<?php
/**
 * The home template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package primebase
 */

get_header(); ?>
    <div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">
  
      <?php if ( have_posts() ) : ?>
  
        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
  
          	<?php /*
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
              <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->
          	*/ ?>
            
            <div class="entry-content">
              <?php the_content(); ?>
              <?php
                wp_link_pages( array(
                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'primebase' ),
                  'after'  => '</div>',
                ) );
              ?>
            </div><!-- .entry-content -->
          	<?php /*
            <footer class="entry-footer">
              <?php edit_post_link( esc_html__( 'Edit', 'primebase' ), '<span class="edit-link">', '</span>' ); ?>
            </footer><!-- .entry-footer -->
          </article><!-- #post-## -->
						*/ ?>
  
        <?php endwhile; ?>
  
        <?php the_posts_navigation(); ?>
  
      <?php else : ?>
  
        <?php get_template_part( 'template-parts/content', 'none' ); ?>
  
      <?php endif; ?>
  
      </main><!-- #main -->
    </div><!-- #primary -->
  
  <?php // get_sidebar(); ?>
<?php get_footer(); ?>
