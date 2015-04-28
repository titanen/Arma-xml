
<?php
INCLUDE 'setup.php' ;
$squadRawData = "";
//XML header
$squadxmlHeader = '<?xml version="1.0"?>'."\n".'<!DOCTYPE squad SYSTEM "squad.dtd">'."\n".'<?xml-stylesheet href="squad.xsl?" type="text/xsl"?>';


$query = "SELECT * FROM squad";


if($result = $database->query($query))
{
	
	while($row = $result->fetch())
	{
		$fileNamePrefix = $row["s_filenameprefix"];
		$fp = fopen($path_dir.$urlDoc."_".$fileNamePrefix.".xml", "w");
		
		$squadRawData = $squadxmlHeader."\n";
		$squadRawData .= '<squad nick="'.$row["s_nick"].'">'."\n";
		$squadRawData .= ' <name>'.$row["s_name"].'</name>'."\n";
		$squadRawData .= ' <email>'.$row["s_email"].'</email>'."\n";
		$squadRawData .= ' <web>'.$row["s_web"].'</web>'."\n";
		$squadRawData .= ' <picture>'.$row["s_picture"].'</picture>'."\n";
		$squadRawData .= ' <title>'.$row["s_title"].'</title>'."\n";
		//member
		$query2 = "SELECT * FROM member WHERE m_member_whichsquad = '".$row["id"]."'";
		if($result2 = $database->query($query2))
		{
			while($row2 = $result2->fetch())
			{
				$squadRawData .= '  <member id="'.$row2["m_member_id"].'" nick="'.$row2["m_member_nick"].'">'."\n";
				$squadRawData .= '   <name>'.$row2["m_member_name"].'</name>'."\n";
				$squadRawData .= '   <email>'.$row2["m_member_email"].'</email>'."\n";
				$squadRawData .= '   <icq>'.$row2["m_member_icq"].'</icq>'."\n";
				$squadRawData .= '   <remark>'.$row2["m_member_remark"].'</remark>'."\n";
				$squadRawData .= ' </member>'."\n";
			}
		} 
		//end of squad
		$squadRawData .= '</squad>';
		
		
		fwrite($fp, $squadRawData);// Write the data to the file
		fclose($fp);// Close the file
		//Reset variables
		$squadRawData = "";
	}
	
} 








	//echo '<td><a href="'.curPageURL().'/xmlf/squad_'.$row["s_filenameprefix"].'.xml">;







?>

