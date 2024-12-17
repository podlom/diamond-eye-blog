<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Glow
 */

if ( ! function_exists( 'diamond_eye_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function diamond_eye_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'glow' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'glow' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'diamond_eye_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function diamond_eye_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'glow' ) );
		if ( $categories_list && diamond_eye_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'glow' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'glow' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'glow' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'glow' ), esc_html__( '1 Comment', 'glow' ), esc_html__( '% Comments', 'glow' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'glow' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Flush out the transients used in diamond_eye_categorized_blog.
 */
function diamond_eye_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'diamond_eye_categories' );
}
add_action( 'edit_category', 'diamond_eye_category_transient_flusher' );
add_action( 'save_post',     'diamond_eye_category_transient_flusher' );

/**
 * Add footer credit and copyright
 */
function diamond_eye_footer() {
    ?>
    <div class="dt-footer-bar">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6">
                    <div class="dt-copyright">
                        <?php
                        $copyright = sprintf( esc_html__( 'Copyright &copy; %1$s %2$s . All rights reserved.', 'glow' ), date( 'Y' ), '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'">'.esc_html( get_bloginfo( 'name', 'display' ) ).'</a>' );
                       
                        echo $copyright;
                        ?>
                    </div><!-- .dt-copyright -->
                </div><!-- .col-lg-6 .col-md-6 -->

                <div class="col-lg-6 col-md-6">
                    <div class="dt-footer-designer">
                        <?php
                        $credit = sprintf( esc_html__( 'Designed by %1$s', 'glow' ), '<a href="'.esc_url( 'https://diamondeye.com.ua/').'" target="_blank" rel="designer">'.esc_html__( 'Diamond Eye', 'glow' ).'</a>' );
                       
                        echo $credit;
                        ?>
                    </div><!-- .dt-footer-designer -->
                </div><!-- .col-lg-6 .col-md-6 -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .dt-footer-bar -->
    <?php
}

add_action( 'diamond_eye_footer', 'diamond_eye_footer' );
