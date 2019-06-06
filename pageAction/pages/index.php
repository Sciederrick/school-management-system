<!DOCTYPE html>
<html>
	<head>	
		<title>Administrator</title>	
		<link href="" rel="stylesheet"/>
	</head>
	<body>
	<div id="nav">
		<ul>
			<li><a href="index">files</a></li>
			<li><a href="index?p=edit">edit</a></li>
			<li><a href="index?p=database">database</a></li>
			<li><a href="index?p=support">support</a></li>
			<li><a href="../index.php">system</a></li>
		</ul>
	</div>
	<div id="main">
	<?php

				$dir="adminpages";


		if(!empty($_GET['p'])){
			$dir_files=scandir($dir,0);
			unset($dir_files[0],$dir_files[1]);
			$p=$_GET['p'];
				if(in_array($p.'.inc.php', $dir_files)){
					include($dir.'/'.$p.'.inc.php');
				}
				else{					
					echo 'Sorry, Page Not Found!';					
				}
		}else{
			include($dir.'/'.'files.inc.php');
		}
		
	?>
	</div>
	</body>
</html>

