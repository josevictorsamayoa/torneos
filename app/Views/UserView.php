<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Usuarios</title>
    <!--  -->
</head>
<body>

    <div class="container">
        
        <h2 class="text-center mt-4 mb-4">Usuarios</h2>

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
                    <div class="col">Listado de Usuarios</div>
                    <div class="col text-right">
                        <a href="<?php echo base_url("/torneos/agregar_jugadores")?>" class="btn btn-success btn-sm">Crear</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Rol</th>
                            <th>Correo</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php

                      if($users)
                        {
                            foreach($users as $user)
                            {
                                echo '
                                <tr>
                                    <td>'.$user["id_usuario"].'</td>
                                    <td>'.$user["nombre"].'</td>
                                    <td>'.$user["apellido"].'</td>
                                    <td>'.$user["rol"].'</td>
                                    <td>'.$user["correo"].'</td>
                                    <td><a href="'.base_url().'/usuarios/editar_usuarios/'.$user["id_usuario"].'" class="btn btn-sm btn-warning">Editar</a></td>
                                    <td><button type="button" onclick="eliminar_usuario('.$user["id_usuario"].')" class="btn btn-danger btn-sm">Eliminar</button></td>
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
    if(confirm("¿Esta seguro de eliminar el usuario?"))
    {
        window.location.href="<?php echo base_url(); ?>/usuarios/eliminar_usuario/"+id;
    }
    return false;
}
</script>