<?php
session_start();
require_once 'system/header.php';
?>
<title>Connexion</title>
</head>
<body>

	<div id="wrapper">
		<div id="page-wrapper" style="margin-top: 35vh;">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					Bonjour <?php echo $_SESSION['username']; ?>
					</div>
				</div>
			</div>

		</div>
	
<?php
require_once 'system/footer.php';
?>
</body>

</html>