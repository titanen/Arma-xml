SquadXML-Editor
===============

Create and edit one or several "squad.xml" files for ArmA and ArmA2 (see
www.arma2.com, trademark by Bohemia Interactive) via a webinterface and 
allows member switching between different squad.xml

Version
=======
2.2

Changelog
=========

-- 2.2
	Changed to Sqlite PDO database driver
	Sqlite3 support added; Thanks to "sancron" for beta testing
	Italian language file added; contributed by =FSI=FlorianGeyer 
-- 2.1
	Fixed: Wrong squad prefix in member list
-- 2.0
	Removed: UTF-8 support
	Added: Sqlite support
	Added: manage several squads
	Added: member switching between squads
	Added: Selected squad logo via file browser
	Added: Sort member list by nick and squad
	Added: Filter member by squad
-- 1.2
	Add UTF-8 support
	Removed "Auto-removes all non-ASCII characters"
-- 1.1 
	Auto-removes all non-ASCII characters
-- 1.0 
	Initial release


Requirements
============

*) Webserver with PHP 5.x


Install (update see below)
=======

1. Unzip folder "squadxml_editor_21.zip" 
2. Move the folder "squadxml" to your webserver
3. Make sure that the folder "squadxml" has write permission (755)
4. Browse to "http://YourDomain.com/squadxml/install.php"
5. Delete "install.php"

Update to 2.2
=============
Sorry no simple update, as database structure has changed from Sqlite to 
Sqlite3. 

Use "phpliteadmin.php" (included) to export the SQL-database "squadxml.sqlite". 
Install version 2.2 and create a new database by using "install.php". 
Use "phpliteadmin.php" to import your "old" database.

Update from 2.0 to 2.1
======================
Replace "index.php"


Usage
=====

0. Change language configuration in "setup.php"
1. Browse to ""http://YourDomain.com/squadxml/index.php"
2. Add at least one squad
3. Add members
4. Optional: Add pictures for squad logos to "http://YourDomain.com/squadxml/"
   in "PAA"-format.

	
IMPORTANT:

	* Dont forget to regular backup your database "squadxml.sqlite" to a local 
	  drive or usb stick
	 
	 
Security
========

To prevent other people from accessing your "squad.xml" protect your files
with ".htacces" and ".htpasswd". Just rename the delivered "htaccess.txt" 
and "htpasswd.txt" files and change username and password in the ".htpasswd"

Default is user:"root" with password:"123456". Dont forget to edit these 
files while they are still "*.txt" files.

See "http://en.wikipedia.org/wiki/.htaccess" as first reference.
	

Copyright
=========

	copyright 2012-2013 by TomNedry, tom.nedry@gmx.net
	www.airpressuretendency.net

	This file is part of "SquadXML-Editor".

    "SquadXML-Editor" is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    "SquadXML-Editor" is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with "SquadXML-Editor". If not, see <http://www.gnu.org/licenses/>.

	
Contributions
=============

	Icons from the Iconset "Silk Icons" by www.famfamfam.com 
	(Creative Commons Attribution 2.5 License)
	
	PHPLiteAdmin by phpLiteAdmin Team (code.google.com/p/phpliteadmin/)
	(GNU GPL v3)
	
	Italian language file by =FSI=FlorianGeyer, 
	Forze Speciali Italiane (www.forzespecialitaliane.com)