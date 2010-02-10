INSTALLATION
------------

1) Decompress zip file.
2) Apply the patch to WordPress source code, depending on operating system:

2a) On Unix platforms, install 'patch' program from software repository,
    and patch WordPress with following command line:

	patch <wordpress_dir>/wp-includes/general-template.php -i calendar-sql-hook.patch

    <wordpress_dir> is the directory WordPress is installed.

2b) On Window platform, install 'patch' from GNUWin32 web site:
    http://gnuwin32.sourceforge.net/packages/patch.htm

    Invoke 'patch' program, please note the '--binary' argument as well:

	C:\Program Files\GNUWin32\bin\patch.exe <wordpress_dir>\wp-includes\general-template.php -i calendar-sql-hook.patch --binary

3) Copy wp-priv-post-access.php to wp-content/plugins/ folder.
4) Activate plugin in WordPress admin page.


NOTES
-----
If patch is not applied, most part of the plugin still works;
only that behavior of calendar would not change at all.
