<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
                    <div class="col">Nuevo Jugador</div>
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
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>No. Camisola</th>
                            <th>Tarjetas</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php

                      /* if($user_data)
                        {
                            foreach($user_data as $user)
                            {
                                echo '
                                <tr>
                                    <td>'.$user["id"].'</td>
                                    <td>'.$user["name"].'</td>
                                    <td>'.$user["email"].'</td>
                                    <td>'.$user["gender"].'</td>
                                    <td><a href="'.base_url().'/torneos/editar_jugadores'.$user["id"].'" class="btn btn-sm btn-warning">Edit</a></td>
                                    <td><button type="button" onclick="delete_data('.$user["id"].')" class="btn btn-danger btn-sm">Delete</button></td>
                                </tr>';
                            }
                        }*/

                        ?>
                    </table>
                </div>
                <div>
                    <?php

                    /*if($pagination_link)
                    {
                        $pagination_link->setPath('crud');

                        echo $pagination_link->links();
                    }*/
                    
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
	background-image: url(../img/estadio.jpg);
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
function delete_data(id)
{
    if(confirm("Are you sure you want to remove it?"))
    {
        window.location.href="<?php echo base_url(); ?>/crud/delete/"+id;
    }
    return false;
}
</script>