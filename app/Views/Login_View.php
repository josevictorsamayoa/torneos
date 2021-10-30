
<!DOCTYPE html>
<html lang="es"><head>
        
        <meta charset="utf-8">
        
        <title> Los 7 Chamusqueros® </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="author" content="wmendez">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&amp;display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&amp;display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/Login.css">
        
                 
    </head>
    
    <body>
       
        <div id="contenedor">
		
            <div id="central">
                <div id="login">
                    <div class="titulo">
                        <img class="logo" src=  "../img/logosiu.JPG">
                    </div>
                    <form method="post" action="<?php echo base_url("/torneos/jugadores")?>">
                        <input type="text" name="correo" placeholder="Correo" required>
                        
                        <input type="password" name="password" placeholder="Contraseña"  required>
                        
                        <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                    </form>
                    <div class="pie-form">
                        <a href="#">¿Perdiste tu contraseña?</a>
                        <a href="#">¿No tienes Cuenta? Registrate</a>
                    </div>
					
                </div>
                
				
            </div>
			
        </div>
         
    
</body>
</html>

