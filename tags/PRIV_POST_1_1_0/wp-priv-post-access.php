<?php
/*
Plugin Name: Private Posts Easy Access
Plugin URI: http://me.abelcheung.org/devel/show-private-posts-in-wordpress/
Description: Show private post links in calendar and archive
Author: Abel Cheung
Author URI: http://me.abelcheung.org/
Version: 1.2

Copyright (c) 2008, 09 Abel Cheung
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
	$val = "WHERE post_type = 'post' AND " .
		get_private_posts_cap_sql( 'post' );

	return $val;
}

function wppriv_fix_post_count ($_term, $taxonomy)
{
	global $wpdb;
	$count = $wpdb->get_var( $wpdb->prepare( "SELECT count(ID) FROM "
		. "$wpdb->term_relationships AS tr INNER JOIN "
		. "$wpdb->posts AS p ON (tr.object_id = p.ID) INNER JOIN "
		. "$wpdb->term_taxonomy AS tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id) "
		. "WHERE tt.term_id = %s AND p.post_type = 'post'", $_term->term_id ) );

	// Can't just replace count in $_term --
	// "Attempt to assign property of non-object"
	$retval = $_term;
	$retval->count = $count;
	return $retval;
}

add_filter('getcalendar_where', 'wppriv_show');
add_filter('getarchives_where', 'wppriv_show');
add_filter('get_category', 'wppriv_fix_post_count', 10, 2);
add_filter('get_post_tag', 'wppriv_fix_post_count', 10, 2);

?>
