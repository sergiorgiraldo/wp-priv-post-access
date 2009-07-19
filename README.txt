INSTALLATION
------------

1. Decompress zip file.
2. Apply the patch to wordpress source code:

   # patch <wordpress_dir>/wp-includes/general-template.php -i calendar-sql-hook.patch

   <wordpress_dir> is the directory WordPress is installed.

3. Copy wp-show-priv-post.php to wp-content/plugins/ folder.
4. Activate plugin in WordPress admin page.


NOTES
-----
If patch is not applied, the plugin still works partially;
monthly archive still shows links to months containing private post.
But behaviour of calendar would not change at all.
