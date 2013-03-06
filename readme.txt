=== Mensy ===
Contributors: Columcille
Tags: menu, drop-down, jQuery
Requires at least: 3.0.0
Tested up to: 3.5.1
Stable tag: 1.0.4

Enables easy creation of drop-down menus in your WordPress theme.

== Description ==

This plugin makes it easy to add a sophisticated jQuery powered drop-down menu to your WordPress theme.

== Installation ==

Upload the plugin into your wp-content/plugins directory
Activate the plugin through the dashboard
Visit the Mensy options page if you want to customize some of the behavior.

To customize the appearance of your drop-down menu, it is recommended that you copy the included mensy.factory.css to your theme folder as mensy.css. Any changes you make to mensy.factory.css in your plugin folder will be lost whenever you update the plugin.

Use Mensy on a standard ul / li menu structure. To turn your list into a drop-down menu, simply add the class mensy-menu top the top level. Example:

	<ul class="mensy-menu">
		<li><a href="foo">List item 1</a></li>
		<li><a href="foo">List item 2 with submenu</a>
			<ul>
				<li><a href="foo">This is a submenu item</a></li>
				<li><a href="foo">This is another submenu item</a></li>
			</ul>
		</li>
	</ul>

Note that Mensy expects the list elements to contain anchor references.

An example using Mensy with wp_list_pages(): 

	<ul class="mensy-menu">
		<?php wp_list_pages("title_li="); ?>
	</ul>

== Screenshots ==

1. Mensy in action with multiple levels

== Changelog ==

= 1.0.4 = 
* Minor updates

= 1.0.3 =
* Mensy will now check your theme folder for mensy.css and will load that if available.

= 1.0.2 = 
* Minor tweaks in documentation

= 1.0.1 =
* Fleshing out documentation
* Adding initial Admin menu; more to come.

= 1.0.0 = 
* Mensy created
