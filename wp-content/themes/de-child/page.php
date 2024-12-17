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
            <div class="col-lg-4 col-md-4">
                <a href="/"><img class="ts-header-logo" src="/wp-content/themes/de-child/img/_4-10.png" /></a>
            </div>
            <div class="col-lg-8 col-md-8">
            <?php

                wp_nav_menu( array(
                    'theme_location' => 'top-menu',
                    'container'      => 'nav',           // Wrap the menu in a <nav> element
                    'container_class'=> 'top-menu',      // Add a class to the container
                    'menu_class'     => 'top-menu-items' // Add a class to the <ul> element
                ) );

            ?>
            </div>
        </div>

		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div id="primary-page" class="content-area dt-content-area wp-block-group is-layout-flow wp-block-group-is-layout-flow">
					<main id="main" class="site-main ts-ln-36" role="main">

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
