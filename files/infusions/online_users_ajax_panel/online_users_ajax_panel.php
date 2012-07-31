<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Type: Panel
| Name: Online Users Ajax Panel
| Version: 1.00
| Author: Valerio Vendrame (lelebart)
| Co-Author: Giovanni Toraldo (scorp)
+--------------------------------------------------------+
| Filename: online_user_ajax_panel.php
| Author: Valerio Vendrame (lelebart)
| Co-Author: Giovanni Toraldo (scorp)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }

//settings
//$root_style  = "FF0000"; //hex only without #
//$admin_style = "00CC00"; //hex only without #

openside($locale['global_010']);
echo "<div id='online_users_ajax'>\n";
include_once INFUSIONS."online_users_ajax_panel/online_users_ajax_data.php";
echo "</div>\n";
closeside();

if ((isset($root_style) && !empty($root_style)) && (isset($admin_style) && !empty($admin_style))) {
	add_to_head("<link rel='stylesheet' href='".INFUSIONS."online_users_ajax_panel/online_users_ajax_style.php?root=".$root_style."&amp;admin=".$admin_style."' type='text/css' />");
} elseif ((isset($root_style) && !empty($root_style)) && (!isset($admin_style) || empty($admin_style))) {
	add_to_head("<link rel='stylesheet' href='".INFUSIONS."online_users_ajax_panel/online_users_ajax_style.php?root=".$root_style."' type='text/css' />");
} elseif ((!isset($root_style) || empty($root_style)) && (isset($admin_style) && !empty($admin_style))) {
	add_to_head("<link rel='stylesheet' href='".INFUSIONS."online_users_ajax_panel/online_users_ajax_style.php?admin=".$admin_style."' type='text/css' />");
} else {
	add_to_head("<link rel='stylesheet' href='".INFUSIONS."online_users_ajax_panel/online_users_ajax_style.php' type='text/css' />");
}

//caution!! if you want to change the delay time (must be in milliseconds), please change also the $lastseen <= number in online_user_ajax_data.php
add_to_head("<script type='text/javascript' src='".INFUSIONS."online_users_ajax_panel/jquery-heartbeat.js'></script>
<script type='text/javascript'>
//<![CDATA[
$(document).ready(function() {
	$.jheartbeat.set({
		url: \"".INFUSIONS."online_users_ajax_panel/online_users_ajax_data.php\", 
		delay: 5000, 
		div_id: \"online_users_ajax\"
	}, function () {
		// Callback Function
	});
});
//]]>
</script>");

//cleanup
if (isset($root_style))  { unset($root_style);  }
if (isset($admin_style)) { unset($admin_style); }
?>