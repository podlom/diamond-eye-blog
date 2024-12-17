<?php
/**
 * Plugin Name:       Yotako General
 * Description:       Yotako wordpress basics .
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1.1.0
 * Author:            Yotako team
 * Text Domain:       yotako
 *
 * @package           yotako
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

function create_block_yotako_wordpress_basic_plugin_block_init() {
	register_block_type( __DIR__ . '/build/blocks/anchor',array(
		'attributes' => array(
			'linkTo' => array(
				'type' => 'string',
			),
			'target' => array(
				'type' => 'string',
				'enum' => array( '_blank','_self' ),
			),
			'text' => array(
				'type' => 'string',
			),
		)
	));
	register_block_type( __DIR__ . '/build/blocks/navigation',array(
		'attributes' => array(
			'category' => array(
				'type' => array( 'string','number' ),
			),
			'defaultClassName' => array(
				'type' => 'string',
			),
			'navigationItems'=> array(),
		)
	));
	register_block_type( __DIR__ . '/build/blocks/map',array(
		'attributes' => array(
			'className' => array(
				'type' => 'string',
			),
			'lat' => array(
				'type' => 'string',
			),
			'lon' => array(
				'type' => 'string',
			),
			'zoom' => array(
				'type' => 'string',
			),
		)
	));

}


add_action( 'init', 'create_block_yotako_wordpress_basic_plugin_block_init' );