<?php
INCLUDE 'setup.php' ; 
INCLUDE ($langinclude) ; 

if ($_POST["id"] == -1)
{
	$query =
  'INSERT INTO squad (s_nick, s_name, s_email, s_web, s_picture, s_title, s_filenameprefix) ' .
  'VALUES ("'.$_POST["s_nick"].'","'.$_POST["s_name"].'", "'.$_POST["s_email"].'", "'.$_POST["s_web"].'", "'.$_POST["s_picture"].'", "'.$_POST["s_title"].'", "'.$_POST["s_filenameprefix"].'") ';
} else {
$query = 'UPDATE squad SET s_nick = "'.$_POST["s_nick"].'", s_name = "'.$_POST["s_name"].'", s_email = "'.$_POST["s_email"].'", s_web = "'.$_POST["s_web"].'", s_picture = "'.$_POST["s_picture"].'", s_title = "'.$_POST["s_title"].'", s_filenameprefix = "'.$_POST["s_filenameprefix"].'" WHERE id='.$_POST["id"].'';
}

$database->exec($query);

	
header("Location: index.php");
?>