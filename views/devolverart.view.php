<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventario DISAMAR</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="inicio.php">Inventario</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu ">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="cerrar.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="inicio.php"><i class="fa fa-dashboard fa-fw"></i>Pagina de inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-alt fa-fw"></i>Agregar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./agregarubicacion.php">Ubicacion</a>
                                </li>
                                <li>
                                    <a href="./agregarfamilia.php">Familia</a>
                                </li>
                                <li>
                                    <a href="./agregarsubfamilia.php">Sub-Familia</a>
                                </li>
                                <li>
                                    <a href="./agregarunidad.php">Unidad</a>
                                </li>
                                <li>
                                    <a href="./agregarper.php">Agregar persona</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-search fa-fw"></i>Buscar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./buscarubicacion.php">Ubicacion</a>
                                </li>
                                <li>
                                    <a href="./buscarfamilia.php">Familia</a>
                                </li>
                                <li>
                                    <a href="./buscarsubfamilia.php">Sub-Familia</a>
                                </li>
                                <li>
                                    <a href="./buscarunidad.php">Unidad</a>
                                </li>
                                
                                <li>
                                    <a href="./buscarper.php">Buscar persona</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-alt fa-fw"></i>Articulos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./agregarinv.php">Agregar articulo</a>
                                </li>
                                <li>
                                    <a href="./buscarinv.php">Buscar articulo</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i>Movimientos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./prestarart.php"><i class="fa  fa-arrow-right fa-fw"></i>salida articulo</a>
                                </li>
                                <li>
                                    <a href="./devolverart.php"><i class="fa  fa-arrow-left fa-fw"></i>Entrada articulo</a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Devolver articulo</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="POST" clase="" name="login">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Nombre del personal" name="nombre" type="nombre" autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     
     
                             <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <a class="btn btn-lg btn-success btn-block" onclick="login.submit();">Agregar</a>
                                        </div>
                                    </div>
                                </div>   
                            </div>  
                        </form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <?php if (!empty($resultadoN)):?>

                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <?php echo $nombreP ?>
                                                    </div>
                                                    <div class="panel-body">
                                                        <?php echo " El articulo prestado es : ".$nombreA; ?>
                                                        <br>
                                                        <?php echo " Cantidad : ".$cantidad; ?>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                                        </p>
                                                        <form method="POST" action="./devolver.php">
                                                            <input type="hidden" name="nombreP" value="<?php echo $nombreP; ?>">
                                                            <input type="hidden" name="nombreA" value="<?php echo $nombreA; ?>">
                                                            <input type="hidden" name="cantidad" value="<?php echo $cantidad;?>">
                                                            <input type="hidden" name="id" value="<?php echo $idarticulo;?>">
                                                            <input type="hidden" name="idprestamo" value="<?php echo $idprestamo;?>">
                                                            <input type="submit" class="btn btn-primary " value="Devolver" >
                                                        </form>

                                                    </div>
                                                    <div class="panel-footer">
                                                        
                                                    </div>
                                                </div>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                    </div>

                    <div class="panel panel-footer">
                        <?php if(!empty($errores)):?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php echo $errores;?>
                                </ul>
                             </div>
                         <?php endif; ?>
                        <?php if(!empty($agregado)):?>
                            <div class="alert alert-success">
                                <ul>
                                    <?php echo $agregado;?>
                                </ul>
                             </div>
                         <?php endif; ?>
                    </div>
            
                
            </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

</body>

</html>
