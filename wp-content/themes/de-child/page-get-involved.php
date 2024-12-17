<?php

declare( strict_types=1 );

/**
 * Template Name: Get Involved Page
 *
 * @package Glow
 * @subpackage DiamondEye_Child
 */

get_header(); ?>

	<div class="container">
        <div class="row">
            <div class="ts-top-menu-container">
                <!-- @ts logo -->
                <div class="ts-top-menu-logo">
                    <a href="/">
                        <img alt="Diamond Eye" class="ts-header-logo" src="/wp-content/themes/de-child/img/_4-10.png" />
                    </a>
                </div>

                <!-- @ts top navigation menu -->
                <nav class="top-menu">
					<?php
					wp_nav_menu( array(
						'theme_location'  => 'top-menu',
						'container'       => false,           // Remove extra <div> container
						'menu_class'      => 'menu-links',    // Apply custom class to <ul>
						'items_wrap'      => '<ul class="%2$s">%3$s</ul>', // Ensure <ul> structure is correct
					) );
					?>
                </nav>
            </div>
        </div>

		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div id="primary-page-get-involved" class="content-area dt-content-area wp-block-group is-layout-flow wp-block-group-is-layout-flow">
					<main id="main" class="site-main ts-ln-18" role="main">

						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-lg-8 -->
		</div><!-- .row -->
	</div><!-- .container -->

<?php

get_footer();
