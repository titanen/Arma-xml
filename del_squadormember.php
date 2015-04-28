<?php
/* 
copyright 2011 by TomNedry, tom.nedry@gmx.net

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
INCLUDE 'setup.php' ; 
INCLUDE ($langinclude) ; 
//DELETE FROM Beispieltabelle WHERE Eigenschaft = 'hart'"); 
$myValueId = $_GET["value"];
$myValueTable = $_GET["table"];
$query = "DELETE FROM ".$myValueTable." WHERE id =".$myValueId;
$database->query($query);

header("Location: index.php");
?>