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
        <!-- pestañas -->
        <?php require 'pestanas.view.php'; ?>


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
                                        <!-- <th>Marca</th> -->
                                        <th>Sub-ubicacion</th>
                                        <th>Familia</th>
                                        <th>Sub-familia</th>
                                        <th>Ocupado</th>
                                        <th>Unidad</th>
                                        <th>Cantidad</th>
                                        <th>Ubicacion</th>
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
                                           <!--  <td><?php echo $mostrar['marca']?></td> -->
                                            <td><?php echo $mostrar['sububicacion']?></td>
                                            <td><?php echo $mostrar['familia']?></td>
                                            <td><?php echo $mostrar['subfamilia']?></td>
                                            
                                            
                                            <td>
                                                <?php 
                                                    if ($mostrar[6]==1) {
                                                        echo "No";
                                                    }else{
                                                        echo "Si";
                                                    } 
                                                ?>
                                            </td>
                                            <td><?php echo $mostrar['unidad']?></td>

                                            <?php 
                                                try{
                                                    $conexion = new PDO('mysql:host=localhost;dbname=inventario','root','');
                                                }catch  (PDOException $e){
                                                    echo "Error: ". $e->getMessage();           
                                                }
                                                $statementbus = $conexion->prepare('SELECT articulos.cantidad,ubicacion.ubicacion FROM articulos INNER JOIN ubicacion ON articulos.ubicacion_idubicacion = ubicacion.idubicacion WHERE articulos.descripcion = :nombre');
                                                $statementbus->execute(array(':nombre'=>$mostrar['descripcion']));
                                                $resultadobus = $statementbus->fetchAll();
                                             ?>

                                            <td>
                                                <?php 
                                                    foreach ($resultadobus as $mostrarbus) {
                                                        echo $mostrarbus['cantidad'];
                                                        echo '<br>';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    foreach ($resultadobus as $mostrarbus) {
                                                        echo $mostrarbus['ubicacion'];
                                                        echo '<br>';
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
