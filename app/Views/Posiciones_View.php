<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Tabla de Posiciones</title>
    <!--  -->
</head>
<body>

    <div class="container">
         <!-- Sidebar-->
        <?php 
            include_once '../app/Views/bodies/sidebar.php';
        ?>
        
        <h2 class="text-center mt-4 mb-4">Tabla de Posiciones</h2>
  
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
                    <div class="col">Posiciones</div>
                    
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>                            
                            <th>Posición</th>
                            <th>Equipo</th>
                            <th>JJ</th>
                            <th>JG</th>
                            <th>JP</th>
                            <th>JE</th>
                            <th>GF</th>
                            <th>GC</th>
                            <th>DG</th>
                            <th>PTS</th>
                        </tr>
                        <?php
                       // echo $equipo_data;
                     /*if($partido_data)
                        {
                            foreach($partido_data as $partido)
                            {
                                echo '
                                <tr>
                                    <td>'.$partido->nombre.'</td>
                                    <td>'.$partido->Fechas.'</td>
                                    <td>'.$partido->fecha_hora_juego.'</td>
                                    <td>'.$partido->Equipo_1.'</td>
                                    <td>'.$partido->Equipo_2.'</td>
                                    <td>'.$partido->jugado.'</td>
                                    <td><a href="'.base_url().'/partidos/editar_partido/'.$partido->id_partido.'" class="btn btn-sm btn-warning">Editar</a></td>
                                    <td><button type="button" onclick="eliminar_partido('.$partido->id_partido.')" class="btn btn-danger btn-sm">Eliminar</button></td>
                                </tr>';
                            }
                        }*/

                        ?>
                    </table>
                </div>
                <div>
                    <?php
/*
                    if($pagination_link)
                    {
                        $pagination_link->setPath('partidos');

                        echo $pagination_link->links();
                    }*/
                    
                    ?>

                </div>
            </div>
        </div>

    </div>
 
</body>
</html>

<script>/*
function eliminar_partido (id)
{
    if(confirm("¿Esta seguro de eliminar el partido?"))
    {
        window.location.href="<?php echo base_url(); ?>/partidos/eliminar_partido/"+id;
    }
    return false;
}*/
</script>