<?php
/*
Plugin Name: Wordpress Windspeed Converter by Ostheimer
Plugin URI: http://www.ostheimer.at/
Description: This Plugin gives you the possibility to insert a converter via widget or shortcode into your site. The user has to write one of five values and the plugin calculates the others.
Author: Andreas Ostheimer
Version: 1.2.2
Author URI: http://www.ostheimer.at

	Copyright 2012  Ostheimer.at  (email : office@ostheimer.at)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/* Version check */
global $wp_version;

$exit_msg='Wordpress Windspeed Converter by Ostheimer requires WordPress 3.0 or newer.
<a href="http://wordpress.org/download/">Please update!</a>';

if(version_compare($wp_version, "3.0","<")) {
	exit($exit_msg);
}

/* Select the URL of the plugin */
$plugin_url_wind = trailingslashit( WP_PLUGIN_URL.'/'. dirname( plugin_basename(__FILE__) ));

/* Localization */
load_plugin_textdomain( 'windspeed', false, dirname( plugin_basename(__FILE__) ).'/languages/'  );

/* Register Widget */
	function wind_init() {
	include WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ).'/widget.php';
	register_widget( 'wind_widget' );
}
add_action('widgets_init','wind_init');

/* Load CSS */
function wind_css() {
	global $plugin_url_wind;
	wp_register_style( 'wind-css', $plugin_url_wind . 'windspeed-converter.css' );
	wp_enqueue_style( 'wind-css' );
}
add_action( 'wp_enqueue_scripts', 'wind_css' );

/* Load Scripts */
function wind_scripts() {
	global $plugin_url_wind;
	wp_enqueue_script('windspeed-converter', $plugin_url_wind . 'windspeed-converter.js', array('jquery'));
	wp_enqueue_script('windspeed-converter_beaufort_scala', $plugin_url_wind . 'windspeed-converter-beaufort-scala.js', array('jquery'));
	wp_localize_script(
	   'windspeed-converter',
	   'messages',
	   array(
			'usecomma' => __( "* Use . (dot) as comma.", 'windspeed' ),
			'numberbetween' => __( "* Number between 1 and 12", 'windspeed' ),
			'mustinteger' => __( "* Number must be a integer.", 'windspeed' )
			)
	);
}
add_action('wp_enqueue_scripts','wind_scripts',10);


/* Generate Shortcode [windspeed_converter] */
function wind_shortcode($atts) {
	ob_start();
	display_shortcode($atts);
	$output_string = ob_get_contents();
	ob_end_clean();
	
	return $output_string;
}
add_shortcode('windspeed_converter','wind_shortcode');

function display_shortcode($atts) {
	extract(shortcode_atts( array(
				'kmh'		=> 'kmh',
				'mph'		=> 'mph',
				'beaufort'	=> 'beaufort',
				'ms'		=> 'ms',
				'knots'		=> 'knots',
				'link' 		=> 'link'
			), $atts ));
	 
	echo '<div id="wind_converter" class="wind_converter">';
		echo '<form name="form_wind_converter">';
			if($kmh != 'false') {
				echo '<div id="kmh" class="field">
						<label>';_e( "Km/h", 'windspeed' ); echo '</label>
						<input type="text" name="kmh" class="input_field" />
					  </div>';
			}
			if($mph != 'false') {
				echo '<div id="mph" class="field">
						<label>';_e( "Mph", 'windspeed' ); echo '</label>
						<input type="text" name="mph" class="input_field" />
					  </div>';
			}
			if($beaufort != 'false') {
				echo '<div id="beaufort" class="field">
						<label>';_e( "Beaufort", 'windspeed' ); echo '</label>
						<input type="text" name="beaufort" class="input_field" />
					  </div>';
			}
			if($ms != 'false') {
				echo '<div id="ms" class="field">
						<label>';_e( "M/s", 'windspeed' ); echo '</label>
						<input type="text" name="ms" class="input_field" />
					  </div>';
			}
			if($knots != 'false') {
				echo '<div id="knots" class="field">
						<label>';_e( "Knots", 'windspeed' ); echo '</label>
						<input type="text" name="knots" class="input_field" />
					  </div>';
			}
				echo '<div class="field message"></div>';
				echo '<div class="clear"></div>';
				if($link != 'false') {
				echo '<div id="link" class="field">
						<a href="http://www.ostheimer.at" target="_blank" title="Ostheimer Wordpress Webdesign and SEO">by Ostheimer.at</a>
					  </div>';
				}
		echo '</form>';
	echo '</div>';
}