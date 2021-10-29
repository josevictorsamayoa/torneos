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
    <title>Equipos</title>
    <!--  -->
</head>



<body>
<!-- Sidebar-->
<?php 
    include_once '../app/Views/bodies/sidebar.php';
?>

<!-- end -->

    <div class="container col-8">
        
        <h2 class="text-center mt-4 mb-4">Equipos</h2>
  
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
                    <div class="col">Listado de Equipos</div>
                    <div class="col text-right">
                        <a href="<?php echo base_url("/equipos/agregar_equipos")?>" class="btn btn-success btn-sm">Crear</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Entrenador</th>
                            <th>Puntos</th>
                            <th>Goles a Favor</th>
                            <th>Goles en Contra</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Jugadores</th>
                        </tr>
                        <?php
                       // echo $equipo_data;
                     if($equipo_data)
                        {
                            foreach($equipo_data as $equipo)
                            {
                                echo '
                                <tr>
                                    <td>'.$equipo->id_equipo.'</td>
                                    <td>'.$equipo->nombre.'</td>
                                    <td>'.$equipo->entrenador.'</td>
                                    <td>'.$equipo->puntos.'</td>
                                    <td>'.$equipo->goles_favor.'</td>
                                    <td>'.$equipo->goles_contra.'</td>
                                    <td><a href="'.base_url().'/equipos/editar_equipos/'.$equipo->id_equipo.'" class="btn btn-sm btn-warning">Editar</a></td>
                                    <td><button type="button" onclick="eliminar_equipo('.$equipo->id_equipo.')" class="btn btn-danger btn-sm">Eliminar</button></td>
                                    <td><a href="'.base_url().'/torneos/jugadores/'.$equipo->id_equipo.'" class="btn btn-sm btn-info">Ver</a></td>
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
                        $pagination_link->setPath('equipos');

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
function eliminar_equipo (id)
{
    if(confirm("¿Esta seguro de eliminar el equipo?"))
    {
        window.location.href="<?php echo base_url(); ?>/equipos/eliminar_equipo/"+id;
    }
    return false;
}
</script>