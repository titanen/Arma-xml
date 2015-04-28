<head>
<title>SquadXML-Editor 2.0 by TomNedry</title>
<link rel="stylesheet" type="text/css" href="squadxml.css">
</head>
<body>
<?php
INCLUDE 'setup.php' ; 
INCLUDE ($langinclude) ;
$myValueId = -1;
$myValueTable = $_GET["table"];
if ($myValueTable == "squad"){
?>

<h1><?php echo $lng_headline_squad;?></h1>
<form method="POST" action="save_newsquad.php">
	<input type="hidden" name="id" value="<?php echo $myValueId;?>">
	<table class="ab">
		<tr>
			<td class="keytext">Nick</td><td><input type="text" name="s_nick" size="50" value=""></td>
		</tr>
		<tr>
			<td class="keytext">Name</td><td><input type="text" name="s_name" size="50" value=""></td>
		</tr>
		<tr>
			<td class="keytext">EMail</td><td><input type="text" name="s_email" size="50" value=""></td>
		</tr>
		<tr>
			<td class="keytext">Web</td><td><input type="text" name="s_web" size="50" value=""></td>
		</tr>
		<tr>
			<td class="keytext">Picture</td><td><select name="s_picture"><option value="">
			<?php
			$dirPath = dir('./'.$picture_dir.'');
			$imgArray = array();
			while (($file = $dirPath->read()) !== false)
			{
			  //if ((substr($file, -3)=="gif") || (substr($file, -3)=="jpg") || (substr($file, -3)=="png"))
			  if ((substr($file, -3)=="paa"))
			  {
				 $imgArray[ ] = trim($file);
			  }
			}
			$dirPath->close();
			sort($imgArray);
			$c = count($imgArray);
			for($i=0; $i<$c; $i++)
			{
				echo "<option value=\"" . $imgArray[$i] . "\">" . $imgArray[$i] . "\n";
			}
			?>
		</select></td>
		</tr>
		<!--
		<tr>
			<td class="keytext">Picture</td><td><input type="text" name="s_picture" size="50" value=""></td>
		</tr>
		-->
		<tr>
			<td class="keytext">Title</td><td><input type="text" name="s_title" size="50" value=""></td>
		</tr>
		<tr>
			<td class="keytext">Prefix</td><td><input type="text" name="s_filenameprefix" size="50" value=""></td>
		</tr>
	</table>
	<p align="left">
	<input type="submit" value="<?php echo $lng_buttonSave; ?>" name="save">
	<input type="button"value="<?php echo $lng_buttonChancel; ?>" onclick="history.back()">
	</p>
</form>


<?php
}
if ($myValueTable == "member"){
$selectOptionsList = '<option selected value="-1">'.$lng_nosquad.'</option>';

$query = "SELECT * FROM squad";
if($result = $database->query($query))
{
	
  while($row = $result->fetch())
  {
    $selectOptionsList .=  '<option value="'.$row["id"].'">'.$row["s_filenameprefix"].'</option>';
	
  }
}
?>
<h1><?php echo $lng_headline_member;?></h1>
<form method="POST" action="save_newmember.php">
	<input type="hidden" name="id" value="<?php echo $myValueId;?>">
	<table class="ab">
		<tr>
			<td class="keytext"><?php echo $lng_m_member_id; ?></td><td><input type="text" name="m_member_id" size="50" value=""></td>
		</tr>
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


<?php } ?>
<?php include_once ("footer.php"); ?>
</body>
</html>