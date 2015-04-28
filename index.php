<?php
INCLUDE 'setup.php' ; 
INCLUDE ($langinclude) ;
function curPageURL() {
 $pageURL = 'http';
 if (!empty($_SERVER["HTTPS"]) == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $path_parts = pathinfo($_SERVER["REQUEST_URI"]);
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path_parts['dirname'];
 } else {
  $path_parts = pathinfo($_SERVER["REQUEST_URI"]);
  $pageURL .= $_SERVER["SERVER_NAME"].$path_parts['dirname'];
 }
 return $pageURL;
}
?>
<html>
<head>
<title>SquadXML-Editor 2.0 by TomNedry</title>
<link rel="stylesheet" type="text/css" href="squadxml.css">
</head>
<body>
<?php
$indexOfChildOne = 1;
$squadNumber = array();
$rowColor = "ab";
$query = "SELECT * FROM squad ORDER BY s_filenameprefix ASC";

if($result = $database->query($query))
{
	echo '<h1>'.$lng_headline_squad.'</h1>';
	echo '<br/><a href="./add_squadormember.php?id='.$indexOfChildOne .'&table=squad"><img src="./gfx/add.png" alt="'.$lng_add.'"> '.$lng_add.'</a><br/><br/>';
	echo '<table cellpadding="0" cellspacing="0" >';
	echo '<tr><th>#</th><th>&nbsp;'.$lng_s_nick.'&nbsp;</th><th>&nbsp;'.$lng_s_name.'&nbsp;</th><th>&nbsp;'.$lng_s_email.'&nbsp;</th><th>&nbsp;'.$lng_s_web.'&nbsp;</th><th>&nbsp;'.$lng_s_picture.'&nbsp;</th><th>&nbsp;'.$lng_s_title.'&nbsp;</th><th>&nbsp;'.$lng_s_filenameprefix.'&nbsp;</th><th>&nbsp;Url&nbsp;</th><th>&nbsp;'.$lng_modeEdit.'&nbsp;</th><th>&nbsp;'.$lng_delete.'&nbsp;</th></tr>';
  while($row = $result->fetch())
  {
    $squadNumber[$indexOfChildOne] = $row["s_filenameprefix"];
	if ($rowColor == "ab") {$rowColor = "ba";} else {$rowColor = "ab";}
	echo '<tr class="'.$rowColor.'">';
	echo '<td>'.$indexOfChildOne.'</td><td>'.$row["s_nick"].'</td><td>'.$row["s_name"].'</td><td>'.$row["s_email"].'</td><td>'.$row["s_web"].'</td><td>'.$row["s_picture"].'</td><td>'.$row["s_title"].'</td><td><a style="text-decoration:none;" href="./index.php?order2=select&typ='.$row["id"].'"><img src="./gfx/application_view_list.png">&nbsp;</a>'.$row["s_filenameprefix"].'</td>';
	echo '<td class="mitte"><a href="'.curPageURL().'/'.$path_dir.$urlDoc.'_'.$row["s_filenameprefix"].'.xml"><img src="./gfx/world_link.png" alt="URL"></a></td>';
	echo '<td class="mitte">';
	echo '<a href="./edit_squadormember.php?value='.$row["id"].'&table=squad"><img src="./gfx/application_edit.png" alt="'.$lng_change.'"></a>';
	echo '</td>';
	echo '<td class="mitte">';
	$temp_query = "SELECT * FROM member WHERE m_member_whichsquad = '".$row["id"]."'";
	$temp_result = $database->query($temp_query);
	if (count ($temp_result->fetch()) > 1) 
	{
		echo '<img src="./gfx/lock.png" alt="'.$lng_nodelete.'">';
	} else {
		echo '<a href="./del_squadormember.php?value='.$row["id"].'&table=squad" onclick="return confirm(\''.$lng_deleteMessage.'\');"><img src="./gfx/cross.png" alt="'.$lng_delete.'"></a>';
	}
		echo '</td>';
		
	echo '</tr>';
	$indexOfChildOne ++;
	
  }
	echo '</table>';
}


//echo '<a href="./write_squadxml.php" style="text-decoration:none;"><p style="width:250px;color:white;border:1px solid red;background-color:salmon;text-align:center;">Squadxml-Dateien <b>JETZT</b> erzeugen!</p></a>';
//Members
echo '<br/><br/>';
$indexOfChildTwo = 1;
$rowColor = "ab";
$showAllMember = "";
if (isset($_GET['order2'])) {
 if ($_GET['order2'] == "squad")
 {
	$query2 = "SELECT * FROM member ORDER BY m_member_whichsquad ASC";
	$sort1 = '<a href="./index.php?order2=nick">'.$lng_m_member_nick.'</a>';
	$sort2 = $lng_m_member_whichsquad;
 } 
 if ($_GET['order2'] == "nick")
 {
	$query2 = "SELECT * FROM member ORDER BY m_member_nick ASC";
	$sort1 = $lng_m_member_nick;
	$sort2 = '<a href="./index.php?order2=squad">'.$lng_m_member_whichsquad.'</a>';
 }
 if ($_GET['order2'] == "select")
 {
	if (isset($_GET['typ'])) {
	$query2 = 'SELECT * FROM member WHERE m_member_whichsquad = "'.$_GET['typ'].'" ORDER BY m_member_nick ASC';
	$sort1 = $lng_m_member_nick;
	$sort2 = $lng_m_member_whichsquad;
	$showAllMember = '&nbsp;-&nbsp;<a href="./index.php">'.$lng_filterOff.'</a>';
	}
}
} else {
	$query2 = 'SELECT * FROM member ORDER BY m_member_nick ASC';
	$sort1 = $lng_m_member_nick;
	$sort2 = '<a href="./index.php?order2=squad">'.$lng_m_member_whichsquad.'</a>';
}

if($result2 = $database->query($query2))
{
	echo '<h1>'.$lng_headline_member.$showAllMember.'</h1>';
	echo '<br/><a href="./add_squadormember.php?id='.$indexOfChildTwo .'&table=member"><img src="./gfx/add.png" alt="'.$lng_add.'"> '.$lng_add.'</a><br/><br/>';
	echo '<table cellpadding="0" cellspacing="0" >';
	echo '<tr><th>#</th><th>&nbsp;'.$lng_m_member_id.'&nbsp;</th><th>&nbsp;'.$sort1.'&nbsp;</th><th>&nbsp;'.$lng_m_member_name.'&nbsp;</th><th>&nbsp;'.$lng_m_member_email.'&nbsp;</th><th>&nbsp;'.$lng_m_member_icq.'&nbsp;</th><th>&nbsp;'.$lng_m_member_remark.'&nbsp;</th><th>&nbsp;'.$sort2.'&nbsp;</th><th>&nbsp;'.$lng_modeEdit.'&nbsp;</th><th>&nbsp;'.$lng_delete.'&nbsp;</th></tr>';
  while($row = $result2->fetch())
  {
    $decodedSquadPrefix ="SELECT s_filenameprefix FROM squad WHERE id=".$row["m_member_whichsquad"];
	$decodedSquadPrefix = $database->query($decodedSquadPrefix);
	$row3 = $decodedSquadPrefix->fetch();
	
	if ($rowColor == "ab") {$rowColor = "ba";} else {$rowColor = "ab";}
	echo '<tr class="'.$rowColor.'">';
	echo '<td>'.$indexOfChildTwo.'</td><td>'.$row["m_member_id"].'</td><td>'.$row["m_member_nick"].'</td><td>'.$row["m_member_name"].'</td><td>'.$row["m_member_email"].'</td><td>'.$row["m_member_icq"].'</td><td>'.$row["m_member_remark"].'</td><td>'.$row3[0].'</td>';
	echo '<td class="mitte">';
	echo '<a href="./edit_squadormember.php?value='.$row["id"].'&table=member"><img src="./gfx/application_edit.png" alt="'.$lng_change.'"></a>';
	echo '</td>';
	echo '<td class="mitte">';
		echo '<a href="./del_squadormember.php?value='.$row["id"].'&table=member" onclick="return confirm(\''.$lng_deleteMessage.'\');"><img src="./gfx/cross.png" alt="'.$lng_delete.'"></a>';
		echo '</td>';
	echo '</tr>';
	$indexOfChildTwo ++;
	
  }
	echo '</table>';
}

include_once ("footer.php");
include_once ("write_squadxml.php");
?>

</body>
</html>