<?php
/*
Plugin Name: Show Private Posts
Plugin URI: http://me.abelcheung.org/devel/show-private-posts-in-wordpress/
Description: Show private post links in calendar and archive
Author: Abel Cheung
Author URI: http://me.abelcheung.org/
Version: 1.0

Copyright (c) 2008  Abel Cheung  (email : abelcheung at gmail [dot] com)
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions
are met:

    * Redistributions of source code must retain the above copyright
      notice, this list of conditions and the following disclaimer.
    * Redistributions in binary form must reproduce the above
      copyright notice, this list of conditions and the following
      disclaimer in the documentation and/or other materials provided
      with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
"AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
POSSIBILITY OF SUCH DAMAGE.

*/

function wppriv_show ($sql)
{
	global $user_ID;

	if (empty ($user_ID))
		return $sql;

	if (!current_user_can ("read_private_posts"))
		return $sql;

	$val =	"WHERE post_type = 'post' AND " .
		"( post_status = 'publish' OR " .
		"( post_status = 'private' AND post_author = '{$user_ID}' ) )";

	return $val;
}

add_filter('getcalendar_where', 'wppriv_show');
add_filter('getarchives_where', 'wppriv_show');

?>
