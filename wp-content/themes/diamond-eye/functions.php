<?php
/**
 * Glow functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Glow
 */


add_action( 'wp_enqueue_scripts', 'diamond_eye_enqueue_styles' );

function diamond_eye_enqueue_styles()
{
	wp_enqueue_style(
		'diamond-eye-style',
		get_stylesheet_uri()
	);
}