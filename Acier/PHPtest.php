<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>

<body>
    <?php
	for($i=1;$i<5;++$i){
		echo "<h" . $i . "> Test Nb. " . $i . "</h" . $i . "> tedt";
	}
    require_once 'create_database_environement.php';
    ?>
    </body>

</html>