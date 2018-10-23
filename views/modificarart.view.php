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
        <!-- pestañas -->
        <?php require 'pestanas.view.php'; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Modificar Articulo</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            <div class="panel panel-default">
                <div class="panel panel-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="POST" clase="" name="loginn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nombre" name="nombre" type="nombre" 
                                        value="<?php echo $nombre; ?>" autofocus>
                                        <input type="hidden" name="idarticulo" value="<?php echo $idarticulo ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Descripcion" name="descripcion" type="descripcion"  value="<?php echo $descripcion; ?>" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">                 
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Descripcion 2" name="descripcion1" type="descripcion2"  value="<?php echo $descripcion1; ?>"autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <input type="number" min="0" class="form-control" placeholder="cantidad" name="cantidad"  type="cantidad"  value="<?php echo $cantidad; ?>"autofocus>
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-lg-12">              
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select  class="form-control" selected="<?php echo $estado; ?>" placeholder="" name="estado" id="select">


                                            <?php if( $estado==1): ?>
                                                <option value="1" selected>Nuevo</option>
                                                <option value="2">Seminuevo</option>
                                                <option value="3">Viejo</option>
                                            <?php endif; ?>
                                            <?php if( $estado==2): ?>
                                                <option value="1">Nuevo</option>
                                                <option value="2" selected>Seminuevo</option>
                                                <option value="3">Viejo</option>
                                            <?php endif; ?>
                                            <?php if( $estado==3): ?>
                                                <option value="1">Nuevo</option>
                                                <option value="2">Seminuevo</option>
                                                <option value="3" selected>Viejo</option>
                                            <?php endif; ?>

                                        </select>
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
