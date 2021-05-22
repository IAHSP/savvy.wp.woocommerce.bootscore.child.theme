<?php
  /**
   * Template Name: Blank without container (guarded)
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Bootscore
   */

  $isLoggedIn = is_user_logged_in();
  $selfURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  get_header();
  ?>
<div id="content" class="site-content">    
    <div id="primary" class="content-area">

        <main id="main" class="site-main">

            <?php if($isLoggedIn): ?>
              <div class="entry-content">
                  <?php the_post(); ?>
                  <?php the_content(); ?>
                  <?php wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bootscore' ),
                    'after'  => '</div>',
                    ) );
                  ?>
              </div>
            <?php else: ?>
              <span class="h3">Sorry, but you do not have permission to view this content.</span><br />
              Please log in to see it.
              <div class="btn-holder mt-4">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-user" aria-controls="offcanvas-user">Log In</button>
              </div>
            <?php endif; ?>

        </main><!-- #main -->

    </div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
