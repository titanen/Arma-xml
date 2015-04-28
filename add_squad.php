<?php
INCLUDE 'setup.php' ; 
INCLUDE ($langinclude) ;

?>
<head>
<title>SquadXML-Editor SQLite</title>
<link rel="stylesheet" type="text/css" href="squadxml.css">
</head>
<body>
<form method="POST" action="save_newsquad.php">
	
	<table class="ab">
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
			<td class="keytext">Picture</td><td><input type="text" name="s_picture" size="50" value=""></td>
		</tr>
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

</body>
</html>