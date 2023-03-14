
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles_main.css">
    <title>Document</title>
</head>

<body>
<?php require("main.php"); ?>





<div class="grid">
<?php
	$dir = "./files/";
	$files = scandir($dir);
	foreach ($files as $file) {
		if (is_file($dir . "/" . $file)) {
			$size = filesize($dir . "/" . $file);
			$mod_time = date("Y-m-d H:i:s", filemtime($dir . "/" . $file));
			echo "<div class=\"file-card\">";
			echo "<div class=\"file-name\"><a href=\"$file\" class=\"file-link enlace\">$file</a></div>";
			echo "<div class=\"file-size\">$size bytes</div>";
			echo "<div class=\"file-modified\">Última modificación: $mod_time</div>";
			echo "</div>";
		}
	}
?>
</div>















</body>

</html>