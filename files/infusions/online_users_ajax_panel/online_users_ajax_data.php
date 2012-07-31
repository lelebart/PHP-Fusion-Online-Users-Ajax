<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Type: Panel
| Name: Online Users Ajax Panel
| Version: 1.01
| Author: Valerio Vendrame (lelebart)
| Co-Author: Giovanni Toraldo (scorp)
+--------------------------------------------------------+
| Filename: online_user_ajax_data.php
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
if (!defined("IN_FUSION")) {
    require_once("../../maincore.php");
    require_once THEME."theme.php"; //fixed by scorp
	$baselink = $settings['siteurl'];
	$adminlink = $settings['siteurl']."administration/";
	$themebullet = str_replace(THEME, $baselink."themes/".$settings['theme']."/", THEME_BULLET);
} else {
	$baselink = BASEDIR;
	$adminlink = ADMIN;
	$themebullet = THEME_BULLET;
}

//settings
$limit = 10;

//localization
if (file_exists(INFUSIONS."online_users_ajax_panel/locale/".$settings['locale'].".php")) {
	include_once INFUSIONS."online_users_ajax_panel/locale/".$settings['locale'].".php";
} else {
	include_once INFUSIONS."online_users_ajax_panel/locale/English.php";
}

//online query
$result = dbquery("SELECT * FROM ".DB_ONLINE." WHERE online_user=".(iMEMBER ? "'".$userdata['user_id']."'" : "'0' AND online_ip='".USER_IP."'"));
if (dbrows($result)) {
	$result = dbquery("UPDATE ".DB_ONLINE." SET online_lastactive='".time()."' 
	WHERE online_user=".(iMEMBER ? "'".$userdata['user_id']."'" : "'0' AND online_ip='".USER_IP."'")."");
} else {
	$result = dbquery("INSERT INTO ".DB_ONLINE." (online_user, online_ip, online_lastactive) 
	VALUES ('".(iMEMBER ? $userdata['user_id'] : "0")."', '".USER_IP."', '".time()."')");
}
$result = dbquery("DELETE FROM ".DB_ONLINE." WHERE online_lastactive<".(time() - 60).""); //clean db

//all members
echo $themebullet." ".$locale['global_014'].": ".number_format(dbcount("(user_id)", DB_USERS, "user_status<='1'"))."<br />\n";

//members to activate
if (iADMIN && checkrights("M") && $settings['admin_activation'] == "1") {
	echo "<a href='".$adminlink."members.php".$aidlink."&amp;status=2' class='side'>".$locale['global_015']."</a>";
	echo ": ".dbcount("(user_id)", DB_USERS, "user_status='2'")."<br />\n";
}

//latest member
$data = dbarray(dbquery("SELECT user_id,user_name FROM ".DB_USERS." WHERE user_status='0' ORDER BY user_joined DESC LIMIT 0,1"));
echo $themebullet." ".$locale['global_016'].": <a href='".$baselink."profile.php?lookup=".$data['user_id']."' class='side'>";
echo trimlink($data['user_name'], 15)."</a><br />\n";

//online query
$result = dbquery("SELECT ton.*, tu.user_id,user_name FROM ".DB_ONLINE." ton LEFT JOIN ".DB_USERS." tu ON ton.online_user=tu.user_id");
$guests = 0; $members = 0;
while ($data = dbarray($result)) {
	if ($data['online_user'] == "0") {
		$guests++;
	} else {
		$members++;
	}
}

//online guest count and list
echo $themebullet." ".$locale['global_011'].": ".$guests."<br />\n";
if (iADMIN && checkrights("B")) {
	$result = dbquery("SELECT * FROM ".DB_ONLINE." WHERE online_user='0'");
	if (dbrows($result) != 0) {
		while ($data = dbarray($result)) {
			$lastseen = time() - $data['online_lastactive'];
			$style = ($lastseen <= 5) ? " style='font-weight:bolder;'" : ""; //text-decoration:blink;
			$iS  = sprintf("%02d",floor((((($lastseen%604800)%86400)%3600)%60)));
			echo (!$style ? "<span class='flright'>+".$iS."'' (-".(60-$iS)."'') </span>" : "")."<span".$style.">".$data['online_ip']."</span><br />\n";
		}
		unset($style); unset($iS); unset($lastseen);
	}
}

//online members count and list
echo $themebullet." ".$locale['global_012'].": ".$members."<br />\n";
$result = dbquery("SELECT ton.*, tu.user_id,user_name,user_lastvisit,user_level 
				FROM ".DB_USERS." tu LEFT JOIN ".DB_ONLINE." ton 
				ON ton.online_user=tu.user_id  WHERE tu.user_lastvisit>'0' AND tu.user_status='0' 
				ORDER BY tu.user_lastvisit DESC LIMIT 0,".(isset($limit) && isnum($limit) ? ($members > $limit ? ($members + $limit) : $limit) : "10")."");
if (dbrows($result) != 0) {
	echo "<ol id='online_list'>\n";
	while ($data = dbarray($result)) {
		$status_class = "offline";
		$lastseen = time() - ($data['online_lastactive'] ? $data['online_lastactive'] : $data['user_lastvisit']);
		//$lastseen = time() - $data['user_lastvisit'];
		//var_dump(time(), $data['online_lastactive'], $data['user_lastvisit'], $lastseen);
		$iY  = sprintf("%2d",floor($lastseen/31449600));
		$iMo = sprintf("%2d",floor($lastseen/2419200));
		$iW  = sprintf("%2d",floor($lastseen/604800));
		$iD  = sprintf("%2d",floor($lastseen/(60*60*24)));
		$iH  = sprintf("%02d",floor((($lastseen%604800)%86400)/3600));
		$iM  = sprintf("%02d",floor(((($lastseen%604800)%86400)%3600)/60));
		$iS  = sprintf("%02d",floor((((($lastseen%604800)%86400)%3600)%60)));
		//var_dump($iY, $iMo, $iW, $iD, $iH, $iM, $iS);
		if ($lastseen <= 5) { // 5000 milliseconds = 5 seconds
			$lastseen = $locale['ol-aj_000'];
			$status_class = "online";
		} elseif ($lastseen < 60) {
			$lastseen = $locale['ol-aj_001'];
			$status_class = "away1m";
		} elseif ($lastseen < 120) {
			$lastseen = $locale['ol-aj_002'];
			$status_class = "away2m";
		} elseif ($lastseen < 180) {
			$lastseen = $locale['ol-aj_003'];
			$status_class = "away3m";
		} elseif ($lastseen < 240) {
			$lastseen = $locale['ol-aj_004'];
			$status_class = "away4m";
		} elseif ($lastseen < 360) {
			$lastseen = $locale['ol-aj_005'];
			$status_class = "away5m";
		} elseif ($iY > 0) {
			$text  = ($iY == 1) ? $locale['ol-aj_006'] : $locale['ol-aj_007'];
			$lastseen = $iY." ".$text;
			$status_class = "offline";
		} elseif ($iMo > 0) {
			$text = ($iMo == 1) ? $locale['ol-aj_008'] : $locale['ol-aj_009'];
			$lastseen = $iMo." ".$text;
			$status_class = "offline";
		} elseif ($iW > 0) {
			$text  = ($iW == 1) ? $locale['ol-aj_010'] : $locale['ol-aj_011'];
			$lastseen = $iW." ".$text;
			$status_class = "weeks";
		} elseif ($iD > 0) {
			$text  = ($iD == 1) ? $locale['ol-aj_012'] : $locale['ol-aj_013'];
			$lastseen = $iD." ".$text;
			$status_class = "days";
		} else {
			$lastseen = $iH.":".$iM."':".$iS."''";
			$status_class = "ages";
		}
		switch ($data['user_level']) {
			case 101: $level_class = "member"; $prefix = ""; break;
			case 102: $level_class = "admin"; $prefix = "#"; break;
			case 103: $level_class = "root"; $prefix = "@"; break;
			default: $level_class = "guest"; $prefix = ""; break;
		}
		echo "\t<li class='".$status_class." ".$level_class."'><span class='flright'>".$lastseen." </span>";
		echo "<a href='".$baselink."profile.php?lookup=".$data['user_id']."' title='".$data['user_name']."' class='side'>";
		echo $prefix.trimlink($data['user_name'], 15)."</a></li>\n";
	}
	echo "</ol>\n";
}

//cleanup
unset($guests); unset($members); unset($limit); unset($baselink); unset($themebullet); 
unset($status_class); unset($level_class); unset($prefix); unset($lastseen); unset($text); 
unset($iY); unset($iMo); unset($iW); unset($iD); unset($iH); unset($iM); unset($iS);
?>