<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>J&J BBQ SYSTEM</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">


        <link rel="stylesheet" href="assets/css/fonticons.css">
        <link rel="stylesheet" href="assets/fonts/stylesheet.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/jquery.fancybox.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <?php

    include('dbconnect.php');

    date_default_timezone_set("America/Chicago");

    $date = date("Y/m/d");

    $date2 = date("D");

    $query = "SELECT * FROM ganancias WHERE fecha='$date'";

    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    $total = $row['total'];

    $cantidad = $row['cantidad'];

    $nuevos = $row['clientesnuevos'];

    $totalsemanal = 0;

    switch ($date2) {
        case 'Thu':
            $query = "SELECT * FROM ganancias ORDER BY id DESC LIMIT 1";
            break;

        case 'Fri':
            $query = "SELECT * FROM ganancias ORDER BY id DESC LIMIT 2";
            break;

        case 'Sat':
            $query = "SELECT * FROM ganancias ORDER BY id DESC LIMIT 3";
            break;

        case 'Sun':
            $query = "SELECT * FROM ganancias ORDER BY id DESC LIMIT 4";
            break;
    }

    $result = mysqli_query($conn, $query);

    ?>
    <body data-spy="scroll" data-target=".navbar-collapse">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <div class="culmn">
            <header id="main_menu" class="header navbar-fixed-top">            
                <div class="main_menu_bg">
                    <div class="container">
                        <div class="row">
                            <div class="nave_menu">
                                <nav class="navbar navbar-default">
                                    <div class="container-fluid">
                                        <!-- Brand and toggle get grouped for better mobile display -->
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                            <a class="navbar-brand" href="index.php">
                                                <img src="assets/images/logos.png" style="height:180px; width:200px;"/>
                                            </a>
                                        </div>

                                        <!-- Collect the nav links, forms, and other content for toggling -->



                                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                            <ul class="nav navbar-nav" style="padding-left:150px;">
                                                <li><a href="generar-orden.php" style="font-size:20px;">GENERAR ORDEN</a></li>
                                                <li><a href="ver-productos.php" style="font-size:20px;">VER PRODUCTOS</a></li>
                                                <li><a href="ganancias.php" style="font-size:20px;">GANANCIAS</a></li>
                                                <li><a href="ver-ordenes.php" style="font-size:20px;">VER ÓRDENES</a></li>
                                                <li><a href="registrar-cliente.php" style="font-size:20px;">REGISTRAR CLIENTE</a></li>
                                                <li><a href="costos.php" style="font-size:20px;">COSTOS</a></li>
                                            </ul>


                                        </div>

                                    </div>
                                </nav>
                            </div>	
                        </div>

                    </div>

                </div>
            </header> <!--End of header -->
        </div><br><br><br><br><br><br><br><br><br>

        <!-- CONTENIDO VARIABLE -->

        <section id="about" class="about">
                <div class="container">
                    <div class="row">

                        <div class="main_about_area sections">
                            <div class="col-sm-10 col-sm-offset-1">

                                <div class="main_about_content">
                                    <div class="row">
                                        <div class="col-sm-12 wow fadeInRight" data-wow-duration="700ms">
                                            <div class="single_about_right_content">
                                                <center>
                                                <h1>Ganancias!</h1><br>
                                                <h2>Hoy:</h2><br>
                                                <h2><?php echo $date ?></h2><br>
                                                <h2>Total ganado: $<?php echo $total ?></h2><br>
                                                <h2>Órdenes vendidas: <?php echo $cantidad ?></h2><br>
                                                <h2>Clientes nuevos: <?php echo $nuevos ?></h2><br>
                                                <a href="nuevodia.php" class="btn btn-success" role="button">Nuevo Día</a><br><br><br><br>
                                                <h2>Esta Semana:</h2>
                                                <table class="table">
                    <thead>
                        <tr>
                            <th style="font-size:20px;">Fecha</th>
                            <th style="font-size:20px;">Ganancias Totales</th>
                            <th style="font-size:20px;">Cantidad de órdenes</th>
                            <th style="font-size:20px;">Clientes nuevos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while($row = mysqli_fetch_assoc($result)){
                            $totalsemanal = $totalsemanal + $row['total'];
                        
                        ?>
                        <tr>
                            <td style="font-size:18px;"><?php echo $row['fecha']; ?></td>
                            <td style="font-size:18px;"><?php echo $row['total']; ?></td>
                            <td style="font-size:18px;"><?php echo $row['cantidad']; ?></td>
                            <td style="font-size:18px;"><?php echo $row['clientesnuevos']; ?></td>
                        </tr>
                        <?php
                    }

                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table><br><br>
                <h2>TOTAL SEMANAL: $<?php echo $totalsemanal; ?></h2>
                                            </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <!-- HASTA AQUÍ CONTENIDO VARIABLE -->

        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>

        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>