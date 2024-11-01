=== Windspeed Converter by Ostheimer ===
Contributors: helpstring
Tags: Windspeed Converter, converter, wind, windspeed, kmh, mph, beaufort, m/s, knots, scala
Requires at least: 3.0
Tested up to: 6.0.0
Stable tag: 1.2.2

The Windspeed Converter gives you the possibility to insert a converter via widget or shortcode into your site.

== Description ==

The user has to write one of five values and the plugin calculates the others.

#### Shortcode
* You can add the Windspeed Converter via shortcode [windspeed_converter]
* If you want to hide the backlink use the shortcode [windspeed_converter link="false"]

#### Widget
* Just insert the widget in the chosen sidebar, type a title and activate the wanted options

#### Translate jQuery Error Messages
1. Open the file windspeed-converter.php and search for wp_localize_script
2. In this function you will find an array with 3 defined strings
3. Translate the strings after the => into your language and save the file

#### Try the demo
See the [Windspeed Converter site](https://www.ostheimer.at/wordpress-plugins/windspeed-converter/ "Windspeed Converter site") for a test run!


== Installation ==

1. Upload  "windspeed-converter" folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the Windspeed Converter to your widget enabled space
4. If you need insert in article please use short tag [windspeed_converter]

== Screenshots ==

1. Windspeed Converter Frontend Widget
2. Windspeed Converter Backend Widget Control

== Frequently Asked Questions ==

= How can I display the Windspeed Converter on the Frontend? =

You can add the shortcode [windspeed_converter] in a post or page so that the Windspeed Converter will be diplayed in that page.

= How can I translate the jQuery Error Messages? =

1. Open the file windspeed-converter.php and search for wp_localize_script
2. In this function you will find an array with 3 defined strings
3. Translate the strings after the => into your language and save the file

== Changelog ==

= 1.2.2 =
* Updates for widget

= 1.2.1 =
* CSS fix

= 1.2 =
* CSS fix

= 1.1 =
* Tested Up 5.1

= 1.0.0 =
* Initial Release

= 1.0.1 =
* Minor Bugfix Release

