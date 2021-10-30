<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="main.php">
    <title>Calendario</title>
    <!--  -->
</head>



<body>
<!-- Sidebar-->
<?php 
    include_once '../app/Views/bodies/sidebar.php';
?>

<!-- end -->

    <div class="container col-8">
        
        <h2 class="text-center mt-4 mb-4">Calendario</h2>
  
        <?php


        $session = \Config\Services::session();

        if($session->getFlashdata('success'))
        {
            echo '
            <div class="alert alert-success">'.$session->getFlashdata("success").'</div>
            ';
        }

        ?>
        
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">Listado de Calendario</div>
                    <div class="col text-right">
                        <a href="<?php echo base_url("/calendarios/agregar_calendario")?>" class="btn btn-success btn-sm">Crear</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php
                       // echo $calendario_data;
                     if($calendario_data)
                        {
                            foreach($calendario_data as $calendario)
                            {
                                echo '
                                <tr>
                                    <td>'.$calendario['id_calendario'].'</td>
                                    <td>'.$calendario['fecha_inico'].'</td>
                                    <td>'.$calendario['fecha_fin'].'</td>
                                    <td><a href="'.base_url().'/calendarios/editar_calendario/'.$calendario['id_calendario'].'" class="btn btn-sm btn-warning">Editar</a></td>
                                    <td><button type="button" onclick="eliminar_calendario('.$calendario['id_calendario'].')" class="btn btn-danger btn-sm">Eliminar</button></td>
                                </tr>';
                            }
                        }

                        ?>
                    </table>
                </div>
                <div>
                    <?php

                    if($pagination_link)
                    {
                        $pagination_link->setPath('calendarios');

                        echo $pagination_link->links();
                    }
                    
                    ?>

                </div>
            </div>
        </div>

    </div>
 
</body>
</html>

<script>
function eliminar_calendario (id)
{
    if(confirm("¿Esta seguro de eliminar el calendario?"))
    {
        window.location.href="<?php echo base_url(); ?>/calendarios/eliminar_calendario/"+id;
    }
    return false;
}
</script>