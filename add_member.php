<?php
INCLUDE 'setup.php' ; 
INCLUDE ($langinclude) ;
$selectOptionsList = '<option selected value="-1">'.$lng_nosquad.'</option>';

$query = "SELECT * FROM squad";
if($result = $database->query($query)
{
	
  while($row = $result->fetch())
  {
    $selectOptionsList .=  '<option value="'.$row["id"].'">'.$row["s_filenameprefix"].'</option>';
	
  }
}
?>
<head>
<title>SquadXML-Editor SQLite</title>
<link rel="stylesheet" type="text/css" href="squadxml.css">
</head>
<body>
<form method="POST" action="save_newmember.php">

	<table class="ab">
		<tr>
			<td class="keytext"><?php echo $lng_m_member_nick; ?></td><td><input type="text" name="m_member_nick" size="50" value=""></td>
		</tr>
		<tr>
			<td class="keytext"><?php echo $lng_m_member_name; ?></td><td><input type="text" name="m_member_name" size="50" value=""></td>
		</tr>
		<tr>
			<td class="keytext"><?php echo $lng_m_member_email; ?></td><td><input type="text" name="m_member_email" size="50" value=""></td>
		</tr>
		<tr>
			<td class="keytext"><?php echo $lng_m_member_icq; ?></td><td><input type="text" name="m_member_icq" size="50" value=""></td>
		</tr>
		<tr>
			<td class="keytext"><?php echo $lng_m_member_remark; ?></td><td><input type="text" name="m_member_remark" size="50" value=""></td>
		</tr>
		<tr>
			<td class="keytext"><?php echo $lng_m_member_whichsquad; ?></td><td><select name="m_member_whichsquad" size="1"><?php echo $selectOptionsList; ?></select></td>
		</tr>
	</table>
	<p align="left">
	<input type="submit" value="<?php echo $lng_buttonSave; ?>" name="save">
	<input type="button"value="<?php echo $lng_buttonChancel; ?>" onclick="history.back()">
	</p>
</form>
<?php include_once ("footer.php"); ?>
</body>
</html>