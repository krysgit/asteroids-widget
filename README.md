=== Asteroids Widget ===
Contributors: Eric Burger, Erik Rothoff Andersson, krysgit
Tags: asteroids, fun, game, plugin, widget, sidebar, javascript, php8
Requires at least: 4.0
Tested up to: 6.5
Requires PHP: 7.4
Stable tag: 3.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Turn your WordPress site into the classic arcade game Asteroids. Modernized fork with full PHP 8+ compatibility.

== Description ==

Turn your site into the game of Asteroids. Click to start and you can destroy the contents of your webpage by flying around and shooting them. 

The plugin is customizable, allowing you to add a description and/or image as well as controlling which pages the Asteroids widget appears on. 

This plugin implements the original JavaScript code by Erik Rothoff Andersson, wrapped as a WordPress widget by Eric Burger (Electric Tree House). This modernized release updates legacy PHP code to run smoothly on PHP 8.0, 8.1, 8.2, and 8.3.

== Installation ==

1. Upload the `asteroids-widget` folder to the `/wp-content/plugins/` directory (or upload the `.zip` file via **Plugins > Add New > Upload Plugin**).
2. Activate the plugin through the **Plugins** menu in WordPress.
3. Navigate to **Appearance > Widgets** and add the **Asteroids** widget to your sidebar.
4. (Optional) Embed the game trigger anywhere on pages or posts using the shortcode `[asteroids]`.

== Frequently Asked Questions ==

= Does this version support PHP 8+? =
Yes. The fatal errors caused by deprecated functions (such as `create_function()`) and legacy PHP 4-style constructors have been resolved.

= Where can I report issues? =
You can report bugs or submit pull requests directly on GitHub: https://github.com/krysgit/asteroids-widget

== Changelog ==

= 3.0.1 =
* Fixed `Fatal Error: Uncaught Error: Call to undefined function create_function()` for PHP 8+ compatibility.
* Updated class constructor from `Asteroids_Widget()` to standard `__construct()`.
* Added explicit GPLv2+ licensing and modern plugin headers.

= 3.0.0 =
* Moved JS to external script.
* Added Shortcode `[asteroids]`.
* Added jQuery toggle to admin options.

= 2.2.2 =
* Re-wrote some of the code.

= 2.2.1 =
* Added Arcade images by Alta Peterson.

= 2.2 =
* Resolved PHP code so that links point to JS and image file in "gears" folder.
* Added another Button and Image option.
* Added option for ship to shoot yellow bullets.

= 2.1 =
* Basically started over. Added Image and Link/Button options to widget. Resolved IE issues.

= 1.1 =
* Resolved initial bugs and IE issues.

= 1.0 =
* First Attempt. Basic Functions.