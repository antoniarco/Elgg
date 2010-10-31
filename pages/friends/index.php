<?php
/**
 * Elgg friends page
 *
 * @package Elgg
 * @subpackage Core
 */

$owner = elgg_get_page_owner();
if (!$owner) {
	gatekeeper();
	set_page_owner(get_loggedin_userid());
	$owner = elgg_get_page_owner();
}

$title = sprintf(elgg_echo("friends:owned"), $owner->name);

$content = elgg_view_title($title);

$content .= "<div class='members_list'>"
	. list_entities_from_relationship('friend', $owner->getGUID(), FALSE, 'user', '', 0, 10, FALSE)
	. "</div>";

$body = elgg_view_layout('one_column_with_sidebar', $content);

page_draw($title, $body);