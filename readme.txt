+--------------------------------------------------------+
| Type: ...... Panel
| Name: ...... Online Users Ajax Panel
| Version: ... 1.01
| Author: .... Valerio Vendrame (lelebart)
| Co-Author: . Giovanni Toraldo (scorp)
| Released: .. Jan, 29th 2011
| Download: .. http://www.php-fusion.it
+--------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------+

	/************************************************\
	
		Table of Contents
		- Description
		- Installation
		- Usage
		- Feature
		- Authors
		- Changelog
		- Future Releases
		- Notes for Developers
		
	\************************************************/

+-------------+
| DESCRIPTION |
+-------------+

With this panel you can show, in REALTIME:
- how many members are registered, 
- member to activate if any,
- latest member,
- how many guest are online (and theyr IP for admins), 
- which memebr are online or have just leaved.

+--------------+
| INSTALLATION |
+--------------+

1. Upload the 'online_users_ajax_panel' folder to your Infusions folder on your webserver;
2. Go to System Admin -> Panels;
3. Click "Add new panel": 
 3.1. give a significative title,
 3.2. select from the drop-down menu 'online_users_ajax_panel',
 3.3. choose the visibilty,
 3.4. type your administration password and
 3.5. click "Save";
4. Set the order and the side of the panel created right away.


+-------+
| USAGE |
+-------+

Open 'online_users_ajax_panel.php' with your favourite editor (read "Notes for Developers" for more), then set up as your preferences:

//settings
//$root_style  = "FF0000"; //hex only without #
//$admin_style = "00CC00"; //hex only without #

Here you can set the color of root or admin, if not used or removed, the php-css style file will set the default values.
Update/Overwrite the remote file if necessary.

Open 'online_users_ajax_data.php' with your favourite editor (read "Notes for Developers" for more), then set up as your preferences:

//settings
$limit = 10;

Here you can set the limit of showed online members:
 consider that if online members are more than this limit, that limit will be incremented by the number of online members
e.g.: limit = 10, but online = 13, then limit = (13+10)=23
Update/Overwrite the remote file if necessary.
	
	
+----------+
| FEATURES |
+----------+

- beat every 5 seconds with heartbeat jQuery plugin
- very customizable - also via css
- show ip addresses of guests if admin
+ Compatible with:
  - PHP-Fusion 7.00.xx
  - PHP-Fusion 7.01.xx

  
+---------+
| AUTHORS |
+---------+

 name - website ............................................ |  0.00 |  1.00 |  1.01
-------------------------------------------------------------+-------+-------+-------
 Valerio Vendrame (lelebart) - http://www.valeriovendrame.it |   *   |   *   |   *  
-------------------------------------------------------------+-------+-------+-------
 Giovanni Toraldo (scorp) - http://www.scorpionworld.it      |       |   *   |     

 
+-----------+
| CHANGELOG |
+-----------+

+ 1.01 (Jan, 29th 2011)
  - ADMIN fix by lelebart

+ 1.00 (Feb, 9th 2010)
  - First public Release
  - THEMEBULLET fix by Scorp

+ 0.00 (Jan, 23rd 2009)
  - Concept, jQuery plugin added, styles rules.. main stuffs


+-----------------+
| FUTURE RELEASES |
+-----------------+

+ 1.02 - n/a
  - Administrative settings page (infusion)
 
 
+----------------------+
| NOTES for DEVELOPERS |
+----------------------+

1. Have Fun ;)
2. For Micorsoft Windows users only: Notepad++ rocks! - http://notepad-plus.sourceforge.net/