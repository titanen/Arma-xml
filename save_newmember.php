<?php
INCLUDE 'setup.php' ; 
INCLUDE ($langinclude) ; 

if ($_POST["id"] == -1)
{
	$query =
  'INSERT INTO member (m_member_id, m_member_nick, m_member_name, m_member_email, m_member_icq, m_member_remark, m_member_whichsquad) ' .
  'VALUES ("'.$_POST["m_member_id"].'", "'.$_POST["m_member_nick"].'", "'.$_POST["m_member_name"].'", "'.$_POST["m_member_email"].'", "'.$_POST["m_member_icq"].'", "'.$_POST["m_member_remark"].'", "'.$_POST["m_member_whichsquad"].'") ';
} else {
	$query = 'UPDATE member SET m_member_id = "'.$_POST["m_member_id"].'", m_member_nick = "'.$_POST["m_member_nick"].'", m_member_name = "'.$_POST["m_member_name"].'", m_member_email = "'.$_POST["m_member_email"].'", m_member_icq = "'.$_POST["m_member_icq"].'", m_member_remark = "'.$_POST["m_member_remark"].'", m_member_whichsquad = "'.$_POST["m_member_whichsquad"].'" WHERE id='.$_POST["id"].'';
}
$database->exec($query);

header("Location: index.php");


//}
?>