<?php
	session_start();
	require_once 'system/header.php';
?>
<title>Connexion</title>
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Fastech Inc.</a>
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="sidebar-nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-dashboard"></i> Semaine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-area-chart"></i> Employé</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-table"></i> Projet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-table"></i> Département</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content-wrapper py-3">

        <div class="container-fluid">

            <!-- Example Tables Card -->
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Suffixe</th>
                                    <th>Date début</th>
                                    <th>Date fin</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Suffixe</th>
                                    <th>Date début</th>
                                    <th>Date fin</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>22-avril-2017</td>
                                    <td>2017-04-22</td>
                                    <td>2017-04-29</td>
                                </tr>
                                <tr>
                                    <td>29-avril-2017</td>
                                    <td>2017-04-29</td>
                                    <td>2017-05-06</td>
                                </tr>
                                <tr>
                                    <td>6-mai-2017</td>
                                    <td>2017-05-06</td>
                                    <td>2017-05-13</td>
                                </tr>
                                <tr>
                                    <td>13-mai-2017</td>
                                    <td>2017-05-13</td>
                                    <td>2017-05-20</td>
                                </tr>
                                <tr>
                                    <td>20-mai-2017</td>
                                    <td>2017-05-20</td>
                                    <td>2017-05-27</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>


<?php
require_once 'system/footer.php';
?>

</body>



</html>