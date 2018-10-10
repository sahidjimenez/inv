<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Buscar inventario</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="./vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="./vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
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
                            <a href="#"><i class="fa fa-user fa-fw"></i>Personal<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./agregarper.php">Agregar persona</a>
                                </li>
                                <li>
                                    <a href="./buscarper.php">Buscar persona</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="./prestarart.php"><i class="fa  fa-arrow-right fa-fw"></i>Prestar articulo</a>
                        </li>
                        <li>
                            <a href="./devolverart.php"><i class="fa  fa-arrow-left fa-fw"></i>Devolver articulo</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Buscar en el inventario</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID articulo</th>
                                        <th>Descripcion</th>
                                        <th>Marca</th>
                                        <th>Sub-ubicacion</th>
                                        <th>Cantidad</th>
                                        <th>Ubicacion</th>
                                        <th>Ocupado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($resultado as $mostrar){  
                                    ?>
                                        <tr class="gradeA">
                                            <td><?php echo $mostrar['idarticulos']?></td>
                                            <td><?php echo $mostrar['descripcion']?></td>
                                            <td><?php echo $mostrar['marca']?></td>
                                            <td><?php echo $mostrar['sububicacion']?></td>
                                            <td><?php echo $mostrar['cantidad']?></td>
                                            <td><?php echo $mostrar['ubicacion_idubicacion']?></td>
                                            
                                            
                                            <td>
                                                <?php 
                                                    if ($mostrar['ocupado_idocupado']==1) {
                                                        echo "No";
                                                    }else{
                                                        echo "Si";
                                                    } 
                                                ?>
                                            </td>
                                            <td>
                                                <form  class="form-class" method="post" action="./modificarart.php">                   
                                                    
                                                    <input type="hidden" name="idarticulo" value="<?php echo $mostrar['idarticulos']?>">
                                                    <input type="hidden" name="nombre" value="<?php echo $mostrar['nombre']?>">
                                                    <input type="hidden" name="descripcion" value="<?php echo $mostrar['descripcion']?>">
                                                    <input type="hidden" name="descripcion1" value="<?php echo $mostrar['descripcion1']?>">
                                                    <input type="hidden" name="cantidad" value="<?php echo $mostrar['cantidad']?>">
                                                    <input type="hidden" name="estado" value="<?php echo $mostrar[6]?>">

                                                    <input type="submit" class="btn btn-info btn-xs" value="Modificar" >
                                                    
                                                </form>
                                                
                                                <form  class="form-class" method="post" action="./eliminarart.php">
                                                                                                      
                                                    <input type="hidden" name="modificar" value="<?php echo $mostrar['idarticulos']?>">
                                                    <input type="submit" class="btn btn-danger btn-xs" value="Eliminar" >
                                                    
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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

    <!-- DataTables JavaScript -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="./vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
