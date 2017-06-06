<?php
session_start ();
require_once 'system/header.php';
header ( 'Content-Type: text/html; charset=utf-8' );
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
				<li id="classSemaine" class="nav-item active"><a id="ongletSemaine" class="nav-link" href="#"><i
						class="fa fa-fw fa-dashboard"></i> Semaine</a></li>
				<li id="classEmploye" class="nav-item"><a id="ongletEmploye" class="nav-link" href="#"><i
						class="fa fa-fw fa-area-chart"></i> Employé</a></li>
				<li id="classProjet" class="nav-item"><a id="ongletProjet" class="nav-link" href="#"><i
						class="fa fa-fw fa-table"></i> Projet</a></li>
				<li id="classDepartement" class="nav-item"><a id="ongletDepartement" class="nav-link" href="#"><i
						class="fa fa-fw fa-table"></i> Département</a></li>
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