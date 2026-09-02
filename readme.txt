=== Asteroids Game Widget Reloaded ===
Contributors: krysgit
Tags: asteroids, game, arcade, widget, fun
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Turn your WordPress site into the classic arcade game Asteroids. A modernized fork with full PHP 8+ compatibility.

== Description ==

Turn your site into the game of Asteroids. Click to start and you can destroy the contents of your webpage by flying around and shooting them. 

The plugin is customizable, allowing you to add a description and/or image as well as controlling which pages the Asteroids widget appears on. 

This plugin is a modernized fork of the original "Asteroids Widget" by Eric Burger and Erik Rothoff Andersson. It has been updated to comply with modern WordPress standards and to run smoothly on modern PHP environments (PHP 8.0, 8.1, 8.2, and 8.3+).

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory (or upload the `.zip` file via **Plugins > Add New > Upload Plugin**).
2. Activate the plugin through the **Plugins** menu in WordPress.
3. Navigate to **Appearance > Widgets** and add the **Asteroids** widget to your sidebar.
4. (Optional) Embed the game trigger anywhere on pages or posts using the shortcode `[asteroids]`.

== Frequently Asked Questions ==

= Does this version support PHP 8+? =
Yes. The fatal errors caused by deprecated functions (such as `create_function()`) and legacy constructors have been completely resolved.

= Where can I report issues? =
You can report bugs or contribute code on GitHub: https://github.com/krysgit/asteroids-widget

== Changelog ==

= 1.0.0 =
* Forked from original Asteroids Widget.
* Fixed `Fatal Error: Uncaught Error: Call to undefined function create_function()` for PHP 8+ compatibility.
* Updated class constructor to standard `__construct()`.
* Added security sanitization, escaping, and direct access guards.
* Added support for WordPress shortcode `[asteroids]`.

== Credits ==

* Original WordPress Plugin by Eric Burger (Electric Tree House).
* Original Asteroids JavaScript game engine by Erik Rothoff Andersson.
* Arcade machine graphics by Alta Peterson.
* PHP 8+ modernization, security hardening, and fork maintenance by Krystalia Saldari.
