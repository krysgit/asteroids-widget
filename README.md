# Asteroids Game Widget Reloaded

Turn your WordPress site into the classic arcade game Asteroids. Click to start and destroy the contents of your webpage by flying around and shooting them. 

This repository contains a modernized, secure fork of the original "Asteroids Widget" by Eric Burger (Electric Tree House) and Erik Rothoff Andersson, fully updated for modern WordPress standards and PHP 8.0, 8.1, 8.2, and 8.3+.

---

## Features
* Classic Asteroids arcade gameplay directly on your WordPress pages.
* Multiple button and retro arcade machine image triggers.
* Optional custom backgrounds and auto-formatting.
* Embed anywhere using the [asteroids] shortcode or as a Sidebar Widget.
* Zero fatal errors on PHP 8+.
* Cleaned of insecure functions (eval removed, proper escaping & sanitization).

---

## Requirements
* WordPress: 5.0 or higher
* PHP: 7.4 to 8.3+
* License: GPLv2 or later

---

## Installation

### Manual Upload (.zip)
1. Download the latest .zip release from the Releases section.
2. In your WordPress Admin, go to Plugins > Add New > Upload Plugin.
3. Select the .zip file and click Install Now.
4. Click Activate Plugin.

### Widget Setup
1. Go to Appearance > Widgets.
2. Add the Asteroids Widget to your preferred sidebar or widget area.
3. Configure your display rules, images, and button styles.

### Shortcode
Add the trigger anywhere in your post or page content using the shortcode: [asteroids]

---

## Changelog

### 1.0.0 (Reloaded)
* Forked from original Asteroids Widget by Eric Burger.
* Fixed Fatal Error: Uncaught Error: Call to undefined function create_function() for PHP 8+ compatibility.
* Updated class constructor from legacy PHP 4 syntax to standard __construct().
* Completely removed insecure eval() execution.
* Added modern sanitization, output escaping, and direct access guards (ABSPATH).
* Converted shortcode output to use Output Buffering.
* Enqueued frontend scripts properly with wp_enqueue_script().

---

## Credits & License
* Original Plugin: Eric Burger (Electric Tree House)
* Original Game Script: Erik Rothoff Andersson
* PHP 8+ Fork Maintainer: Chris Saldaris ([https://github.com/krysgit](https://github.com/krysgit))
* License: Distributed under the GNU General Public License v2.0 or later ([https://www.gnu.org/licenses/gpl-2.0.html](https://www.gnu.org/licenses/gpl-2.0.html)).
