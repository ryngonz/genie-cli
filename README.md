Genie CLI
=========

It's a Wordpress command line and macro generator plugin that lets user use a command line text box to search, create new posts/pages, delete, or do proceedure calls inside the wordpress installation. It can also optimize and clean the wp_posts table from drafts or trashed posts and backup the database. To start the plugin, you must be using an administrator account and press " ` " or " ~ ".

<strong>Commands:</strong>

<strong>NEW:</strong>  <i>new {page/post/any custom post type} {"title"}</i>
- Opens the add post page on the admin panel to add another page/post/custom post.

<strong>FIND:</strong> <i>find {page/post/any custom post type} {"title"}</i>
- Finds a certain post in the page/post/custom post.

<strong>REPLACE:</strong> <i>replace {"find"} {"replace"} (content/title ; default is content) (page/post/any custom post type)</i>
- Finds and replace a certain type of string in the page/post/custom post type. !Case Sensitive!

<strong>BACKUP:</strong> <i>backup</i>
- Creates a backup of your mysql database and allows you to download the sql file.

<strong>CLEAN:</strong> <i>clean (page/post/any custom post type)</i>
- Deletes all trashed and auto-drafted pages/posts in the database to clear up space and optimize the wp_posts table.

<strong>Legend:</strong>
- Required {}
- Optional ()
