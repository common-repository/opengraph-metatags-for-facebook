=== Plugin Name ===
Contributors: JordiPlana
Tags: open graph, opengraph, metatags, facebook, title, description, content
Requires at least: 1.5.0
Tested up to: 3.4.1
Stable tag: 1.26

== Description ==
The plugin just adds the Open Graph metatags on your header, based on  the title, content and thumbnail of your post.

A working and simple solution.

For more information about this plugin you can check [the official page](http://jordiplana.com/opengraph-metatags-facebook "Open Graph Metatags Plugin for Wordpress").

== Installation ==
1. Download the plugin from the Wordpress plugin repository, unzip and upload to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Enjoy!

== Frequently Asked Questions ==

= What are Open Graph Metatags? =
Open Graph is a protocol for customizing which information will be scrapped from your site, on Facebook sharing.

= What does the plugin? =
The plugin just adds the Open Graph metatags on your header, based on the title, content and thumbnail of your post.

== Changelog ==
= 1.26 =
* Strip shortcodes function added in order to sanitize description.

= 1.25 =
* Added extra process to get first image attachment as sharing thumbnail, in case of post-thumbnail ausence.
= 1.2 =
* Fixed a bug about thumbnail sharing.
= 1.1 =
* Added extra sanitization of description
* Added more Open Graph tags: type, url, locale and sitename.
= 1.0 =
* First version

== TODO ==
1. Develop an user interface to manually introduce which content will be shown.
1. Integration with WordPress SEO by Yoast plugin.
1. Integration with WPML.