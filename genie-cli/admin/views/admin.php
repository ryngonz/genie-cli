<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   Genie_CLI
 * @author    Ryan Gonzales <ryngonz@gmail.com>
 * @license   GPL-2.0+
 * @link      http://www.mojobitz.com
 * @copyright 2014 Ryan Gonzales
 */
?>

<div class="wrap">

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<hr />
	<!-- @TODO: Provide markup for your options page here. -->
	
	<p>It's a Wordpress command line plugin that lets user use a command line text box to search, create new posts/pages, delete, or do proceedure calls inside the wordpress installation. It can also optimize and clean the wp_posts table from drafts or trashed posts and backup the database. To start the plugin, you must be using an administrator account and press " ` " or " ~ ".</p>

	<p><strong>Commands:</strong></p>

	<p><strong>NEW:</strong>  <i>new {page/post/any custom post type} {"title"}</i></p>

	<p>
	Opens the add post page on the admin panel to add another page/post/custom post.
	</p>
	<p><strong>FIND:</strong> <i>find {page/post/any custom post type} {"title"}</i></p>

	<p>
	Finds a certain post in the page/post/custom post.
	</p><p><strong>REPLACE:</strong> <i>replace {"find"} {"replace"} (content/title ; default is content) (page/post/any custom post type)</i></p>

	<p>
	Finds and replace a certain type of string in the page/post/custom post type. !Case Sensitive!
	</p><p><strong>BACKUP:</strong> <i>backup</i></p>

	<p>
	Creates a backup of your mysql database and allows you to download the sql file.
	</p><p><strong>CLEAN:</strong> <i>clean (page/post/any custom post type)</i></p>

	<p>
	Deletes all trashed and auto-drafted pages/posts in the database to clear up space and optimize the wp_posts table.
	</p><p><strong>Legend:</strong></p>

	<p>
	Required {}
	Optional ()
	</p>
	
</div>
