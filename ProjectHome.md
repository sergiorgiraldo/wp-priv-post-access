## Goal ##

This project tries to make private posts more accessible within wordpress. Since day one, private posts within wordpress are only shown in page-by-page browsing, and nowhere else, even for authors themselves after logging in. This causes navigation of private posts much more difficult than it should be.

Limitation of private posts also occurs in admin interface -- one can't locate private posts easily by selecting categories and tags. In particular, if certain category or tag is used by private posts _only_, the link to posts is removed (because _public post_ count is zero) and users are denied access to their own posts!

This project tries to remedy such situation.

## What it does ##

  * Show private post link in monthly archive widget.
  * Show private post link in calendar widget. (**patch must be applied**)
  * Fix post count in category page in admin interface, to reflect counts of private posts.
  * Fix post count in tag page in admin interface, to reflect counts of private posts.

Currently it consists of a plugin and a patch against wordpress core. See Patch section below on how to apply the necessary patch to wordpress blog (and the patch procedure is also documented inside `README.txt` in zip file). If patch is not applied, most of the plugin still works, except that behavior of calendar widget would not change.

## Download ##

  * For Wordpress ≤ 2.7.x, use version 1.0. **Newer versions of this plugin are not compatible with Wordpress ≤ 2.7.x.**
  * For Wordpress ≥ 2.8.x, use newest version.

## Install ##
Please refer to `README.txt` inside zip file for installation instruction.

## Patch ##
A patch can be applied to wordpress core for full feature, which can't be done through plugins unless a completely new calendar widget is developed. Such effort is not worthwhile. For now, this procedure is done with `patch` utility, which is generally available on all Unix platforms, but [must be downloaded separately](http://gnuwin32.sourceforge.net/packages/patch.htm) for Windows. Here are the relevant command on corresponding platform. (Note that following command consists of one line only, but might be listed as 2 lines below because of insufficient space)

  * Unix
> > `patch `_`<wordpress_dir>`_`/wp-includes/general-template.php -i calendar-sql-hook.patch`
  * Windows
> > `"C:\Program Files\GNUWin32\bin\patch.exe" `_`<wordpress_dir>`_`\wp-includes\general-template.php -i calendar-sql-hook.patch --binary`


## Changelog ##
  * Version 1.3 (2010-02-10)
> > Add filter to show empty category in sidebar widgets if logged in, since categories containing private posts only are not shown by default
  * Version 1.2 (2009-07-23)
> > Also fix post count in admin interface
  * Version 1.1 (2009-07-22)
> > Adapt for wordpress 2.8
  * Version 1.0 (2008-06-20)
> > Initial release