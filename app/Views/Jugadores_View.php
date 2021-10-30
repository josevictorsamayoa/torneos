<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Juagadores</title>
    <!--  -->
</head>
<body>

    <div class="container">
        
        <h2 class="text-center mt-4 mb-4">Jugadores</h2>

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
                    <div class="col">Listado de Jugadores</div>
                    <div class="col text-right">
                        <a href="<?php echo base_url("/torneos/agregar_jugadores")?>" class="btn btn-success btn-sm">Crear</a>
                        <a href="<?php echo base_url("/equipos/equipo")?>" class="btn btn-dark btn-sm">Regresar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Fecha de Nac.</th>
                            <th>CUI</th>
                            <th>No. Camisola</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php

                      if($jugador_data)
                        {
                            foreach($jugador_data as $jugador)
                            {
                                echo '
                                <tr>
                                    <td>'.$jugador["id_jugador"].'</td>
                                    <td>'.$jugador["nombre"].'</td>
                                    <td>'.$jugador["apellido"].'</td>
                                    <td>'.$jugador["fecha_nac"].'</td>
                                    <td>'.$jugador["cui"].'</td>
                                    <td>'.$jugador["numero"].'</td>
                                    <td><a href="'.base_url().'/torneos/editar_jugadores/'.$jugador["id_jugador"].'" class="btn btn-sm btn-warning">Editar</a></td>
                                    <td><button type="button" onclick="eliminar_jugador('.$jugador["id_jugador"].')" class="btn btn-danger btn-sm">Eliminar</button></td>
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
                        $pagination_link->setPath('torneos');

                        echo $pagination_link->links();
                    }
                    
                    ?>

                </div>
            </div>
        </div>

    </div>
 
</body>
</html>
<style>

 body {
	margin: 0;
	background-attachment: fixed;
	background-position: center center;
	background-image: url(../../img/estadio.jpg);
	background-repeat: no repeat;
} 
.pagination li a
{
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.pagination li.active a {
    z-index: 1;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
</style>

<script>
function eliminar_jugador (id)
{
    if(confirm("¿Esta seguro de eliminar el jugador?"))
    {
        window.location.href="<?php echo base_url(); ?>/torneos/eliminar_jugador/"+id;
    }
    return false;
}
</script>