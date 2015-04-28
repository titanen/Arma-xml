<?php
/* 
copyright 2011-2013 by TomNedry, tom.nedry@gmx.net

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
    along with "SquadXML-Editor".  If not, see <http://www.gnu.org/licenses/>.
*/

  //create or open the database
  $database = new PDO('sqlite:squadxml.sqlite3');

// Edit to fit your needs
$urlDoc = "squad"; // Name of your squad.xml ;-)
$path_dir = ""; // path to your squad.xml (directory where "squadxml.php" is, or subdirectory) WITH ending slash (e.g. xmf/)
$picture_dir = ""; //path to your PAA logo files
$lang = "en"; // Select your language ("en" or "de"). To add your language make a copy of "en.php", rename it to "xy.php" and edit it here...

// Touch this if you're knowing what you're doing only
//$path_dir .=   $urlDoc . ".xml";
$langinclude = $lang . ".php";
?>