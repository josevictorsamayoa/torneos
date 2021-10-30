<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Agregar Usuario</title>
    <!--  -->
</head>
<body>
    <div class="container">
        
        <h2 class="text-center mt-4 mb-4">Agregar Usuario</h2>

        <?php

        $validation = \Config\Services::validation();

        ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">Ingrese los datos del equipo</div>
                    <div class="col text-right">
                        
                    </div>
                </div>
            </div>
            
            
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url("/usuarios/edit_validation_user")?>">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $user['nombre'] ?>" />
                        <?php
                        if($validation->getError('nombre'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('nombre').'</div>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <input type="text" name="apellido" class="form-control" value="<?php echo $user['apellido'] ?>"/>
                        <?php
                        if($validation->getError('apellido'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('apellido').'</div>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Rol</label>
                        <select name="rol" class="form-control">
                            <?php if ($user['rol'] == 'Administrador'){ ?>
                            <option value="Administrador" selected>Administrador</option>
                            <option value="Entrenador">Entrenador</option>
                            <?php } else { ?>
                                <option value="Administrador">Administrador</option>
                                <option value="Entrenador" selected>Entrenador</option>
                            <?php
                            } ?>
                        </select>
                        <?php
                        if($validation->getError('rol'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('rol').'</div>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="correo" class="form-control" value="<?php echo $user['correo'] ?>"/>
                        <?php
                        if($validation->getError('correo'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('correo')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $user['password'] ?>"/>
                        <?php
                        if($validation->getError('password'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('password')."
                            </div>
                            ";
                        }
                        ?>
                    </div>                                
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_user" value="<?php echo $user["id_usuario"]; ?>" />
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
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

</style>