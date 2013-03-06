<?php
/*
Plugin Name: Mensy
Plugin URI: http://croberts.me/mensy/
Description: Enables easy creation of drop-down menus in your WordPress theme.
Version: 1.0.4
Author: Chris Roberts
Author URI: http://croberts.me/
*/

/*  Copyright 2013 Chris Roberts (email : chris@dailycross.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// Add to the Admin function list
if (! function_exists('mensy_addoptions')) {
  function mensy_addoptions()
  {
    if (function_exists('add_options_page')) {
      add_options_page('Mensy Plugin Options', 'Mensy', 'manage_options', basename(__FILE__), 'mensy_options_subpanel');
    }
  }
}

if (! function_exists('mensy_options_subpanel')) {
  function mensy_options_subpanel()
  {
    global $wpdb, $table_prefix;
?>

<div class="wrap">
	<h2>Mensy Options</h2>

	For now, this page is just an informational placeholder. Future versions of Mensy will allow you to specify values on this page, such as how long menus should delay before fading out, how fast menus fade out, and various styling options.<br /><br />
	
	To use Mensy, simply add the class <i>mensy-menu</i> to the top-level ul element of a standard ul/li link list. For example:<br /><br />
	
	<span style="margin-left: 10px;">&lt;ul <b>class=&quot;mensy-menu&quot;</b>&gt;</span><br />
		<span style="margin-left: 30px;">&lt;li&gt;&lt;a href=&quot;foo&quot;&gt;List item 1&lt;/a&gt;&lt;/li&gt;</span><br />
		<span style="margin-left: 30px;">&lt;li&gt;&lt;a href=&quot;foo&quot;&gt;List item 2 with submenu&lt;/a&gt;</span><br />
			<span style="margin-left: 50px;">&lt;ul&gt;</span><br />
				<span style="margin-left: 70px;">&lt;li&gt;&lt;a href=&quot;foo&quot;&gt;This is a submenu item&lt;/a&gt;&lt;/li&gt;</span><br />
				<span style="margin-left: 70px;">&lt;li&gt;&lt;a href=&quot;foo&quot;&gt;This is another submenu item&lt;/a&gt;&lt;/li&gt;</span><br />
			<span style="margin-left: 50px;">&lt;/ul&gt;</span><br />
		<span style="margin-left: 30px;">&lt;/li&gt;</span><br />
	<span style="margin-left: 10px;">&lt;/ul&gt;</span><br /><br />
	
	The code abode produces the following menu:<br /><br />
	
	<ul class="mensy-menu">
		<li><a href="foo">List item 1</a></li>
		<li><a href="foo">List item 2 with submenu</a>
			<ul>
				<li><a href="foo">This is a submenu item</a></li>
				<li><a href="foo">This is another submenu item</a></li>
			</ul>
		</li>
	</ul>
	
	<br />
	
	Using Mensy with WordPress' wp_list_pages() function is also straightforward:<br /><br />
	
	<span style="margin-left: 10px;">&lt;ul <b>class=&quot;mensy-menu&quot;</b>&gt;</span><br />
		<span style="margin-left: 30px;">&lt;?php wp_list_pages("title_li="); ?&gt;</span><br />
	<span style="margin-left: 10px;">&lt;/ul&gt;</span><br /><br />
	
	If you have any questions, comments, or suggestions, visit <a href="http://croberts.me/mensy/">http://croberts.me/mensy/</a> and leave a comment.<br />
</div>

<?php
  }
}

if (! function_exists('mensy_load_for_admin')) {
	function mensy_load_for_admin()
	{
		if (file_exists(get_theme_root() .'/mensy.css')) {
			echo '<link rel="stylesheet" type="text/css" href="'. get_bloginfo('template_url') .'/mensy.css">';
		} else if (file_exists(WP_PLUGIN_DIR .'/mensy/mensy.css')) {
			echo '<link rel="stylesheet" type="text/css" href="'. plugins_url() .'/mensy/mensy.css">';
		} else if (file_exists(WP_PLUGIN_DIR .'/mensy/mensy.factory.css')) {
			echo '<link rel="stylesheet" type="text/css" href="'. plugins_url() .'/mensy/mensy.factory.css">';
		}
	}
}

if (! function_exists('mensy_load_scripts')) {
	function mensy_load_scripts()
	{
		// Load jQuery, if not already present
		wp_enqueue_script('jquery');
		
		// Load the Mensy script
		wp_register_script('Mensy', plugins_url() .'/mensy/mensy.js', array('jquery'), '1.0.3');
		wp_enqueue_script('Mensy');
	}
}

if (! function_exists('mensy_load_styles')) {
	function mensy_load_styles()
	{
		// Load the Mensy css
		if (file_exists(get_theme_root() . "/". get_template() . "/mensy.css")) {
			wp_register_style('Mensy', get_bloginfo('template_url') .'/mensy.css');
		} else if (file_exists(WP_PLUGIN_DIR .'/mensy/mensy.css')) {
			wp_register_style('Mensy', plugins_url() .'/mensy/mensy.css');
		} else if (file_exists(WP_PLUGIN_DIR .'/mensy/mensy.factory.css')) {
			wp_register_style('Mensy', plugins_url() .'/mensy/mensy.factory.css');
		}
		
		wp_enqueue_style('Mensy');
	}
}

add_action('wp_print_scripts', 'mensy_load_scripts');
add_action('wp_print_styles', 'mensy_load_styles');
add_action('admin_head', 'mensy_load_for_admin');

add_action('admin_menu', 'mensy_addoptions');
?>