<?php header("Content-Type: text/css"); ?>
@charset "utf-8";
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
| Filename: online_users_ajax_style.php
| Author: Valerio Vendrame (lelebart)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
<?php $root_style = "#".(isset($_GET['root']) && !empty($_GET['root']) ? $_GET['root'] : "FF0000"); ?>
<?php $admin_style = "#".(isset($_GET['admin']) && !empty($_GET['admin']) ? $_GET['admin'] : "00CC00"); ?>
#online_list {margin:0 !important;padding:0 !important;}
.flleft {float: left !important;}
.flright {float: right !important;}
/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*+
|       css customization         |
+*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/
#online_list li {padding-left:18px;list-style-type:none;display:block;margin:0 !important;}
#online_list li.root a {color: <?php echo $root_style; ?> !important;}
#online_list li.admin a {color: <?php echo $admin_style; ?> !important;}
#online_list li.online {background: transparent url(images/bullet_green.png) no-repeat left;}
#online_list li.away1m {background: transparent url(images/bullet_green.png) no-repeat left; text-decoration: blink;}
#online_list li.away2m {background: transparent url(images/bullet_blue.png) no-repeat left;}
#online_list li.away3m {background: transparent url(images/bullet_yellow.png) no-repeat left;}
#online_list li.away4m {background: transparent url(images/bullet_orange.png) no-repeat left;}
#online_list li.away5m {background: transparent url(images/bullet_red.png) no-repeat left;}
#online_list li.days {background: transparent url(images/bullet_pink.png) no-repeat left;}
#online_list li.weeks {background: transparent url(images/bullet_purple.png) no-repeat left;}
#online_list li.ages {background: transparent url(images/bullet_white.png) no-repeat left;}
#online_list li.offline {background: transparent url(images/bullet_black.png) no-repeat left;}
<?php unset($root_style); unset($admin_style); ?>