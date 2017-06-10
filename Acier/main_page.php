<?php
session_start ();
require_once 'system/header.php';
header ( 'Content-Type: text/html; charset=utf-8' );
if(!isset($_SESSION['current_page'])){
	include 'MVC/Controller/db_workWeek_manager.php';
	$_SESSION["work_weeks"] = getAllActiveWorkWeeksInDatabase();
	$_SESSION['current_page'] = "Semaine";
}

?>
<title>Connexion</title>
</head>

<body id="page-top">

	<!-- Navigation -->
	<nav id="mainNav"
		class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
		<button class="navbar-toggler navbar-toggler-right" type="button"
			data-toggle="collapse" data-target="#navbarExample"
			aria-controls="navbarExample" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#">Fastech Inc.</a>
		<div class="collapse navbar-collapse" id="navbarExample">
			<ul class="sidebar-nav navbar-nav">
			<?php 
			$pages = array("Semaine"=> "Semaine",
					"Employe"=>"Employé",
					"Projet"=>" Projet",
					"Departement"=>"Département");
			foreach($pages as $key => $value){
				
				echo" <li id='class$key' class='nav-item ";
				if($key == $_SESSION['current_page']){
					echo " active";
				}
				echo "'><a  data-animation='ripple' id='onglet$key' class='nav-link' href='javascript:void(0)'><i";
				echo " class='fa fa-fw fa-dashboard'></i> $value</a></li>";
			}
			?>
				
			</ul>
		</div>
	</nav>

	<div id="content" class="content-wrapper py-3"></div>
	

	<a class="scroll-to-top rounded" href="#page-top"> <i
		class="fa fa-chevron-up"></i>
	</a>


	<?php
		require_once 'system/footer.php';
	?>
	
	<script>fillDiv();</script>
</body>



</html>