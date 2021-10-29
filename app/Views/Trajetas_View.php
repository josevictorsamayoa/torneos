<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Tarjetas</title>
    <!--  -->
</head>
<body>

    <div class="container">
        
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
                    <div class="col">Tarjetas por jugador</div>
                    <div class="col text-right">
                        <a href="<?php echo base_url("/tarjetas/agregar_tarjetas")?>" class="btn btn-success btn-sm">Crear</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Jugador</th>
                            <th>Partido</th>
                            <th>Color de Tarjeta</th>
                            <th>Fecha</th>
                            <th>Motivo</th>
                            <th>Estado</th>
                            <th>Sansión Cumplida</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Pagar</th>
                        </tr>
                        <?php
                       // echo $equipo_data;
                     if($tarjeta_data)
                        {
                            foreach($tarjeta_data as $tarjeta)
                            {
                                echo '
                                <tr>
                                    <td>'.$tarjeta["id_tarjeta"].'</td>
                                    <td>'.$tarjeta["id_jugador"].'</td>
                                    <td>'.$tarjeta["id_usuario"].'</td>
                                    <td>'.$tarjeta["id_partido"].'</td>
                                    <td>'.$tarjeta["color_tarjeta"].'</td>
                                    <td>'.$tarjeta["fecha"].'</td>
                                    <td>'.$tarjeta["motivo"].'</td>
                                    <td>'.$tarjeta["estado"].'</td>
                                    <td>'.$tarjeta["cumplio_sansion"].'</td>
                                    <td><a href="'.base_url().'/equipos/editar_tarjetas/'.$tarjeta["id_tarjeta"].'" class="btn btn-sm btn-warning">Editar</a></td>
                                    <td><button type="button" onclick="eliminar_tarjeta('.$tarjeta["id_tarjeta"].')" class="btn btn-danger btn-sm">Eliminar</button></td>
                                    <td><a href="'.base_url().'/pagos/pago/'.$tarjeta["id_tarjeta"].'" class="btn btn-sm btn-info">Pagar</a></td>
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
                        $pagination_link->setPath('tarjetas');

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
    if(confirm("¿Esta seguro de eliminar la tarjeta?"))
    {
        window.location.href="<?php echo base_url(); ?>/equipos/eliminar_tarjeta/"+id;
    }
    return false;
}
</script>