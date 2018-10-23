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
                        <h1 class="page-header">Prestar articulo</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            <div class="panel panel-default">
                <div class="panel panel-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="POST" clase="" name="login">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Persona" name="persona" type="persona" list="listapersonas" autofocus>
                                        <datalist id=listapersonas> 
                                            <?php foreach ($resultado_personas as $mostrar_personas){ ?> 
                                                <option><?php echo $mostrar_personas['nombre'] ?></option>
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Articulo" name="articulo" type="articulo" list="listaarticulos" autofocus>
                                        <datalist id=listaarticulos> 
                                            <?php foreach ($resultado_articulos as $mostrar_articulos){ ?> 
                                                <option><?php echo $mostrar_articulos['nombre'] ?></option>
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">                 
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="number" min="0" class="form-control" placeholder="Cantidad" name="cantidad"  type="cantidad" autofocus>

                                        
                                    </div>
                                </div>
                            </div>   
                        </div>
                        
                         <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <a class="btn btn-lg btn-success btn-block" onclick="login.submit();">Modificar</a>
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
