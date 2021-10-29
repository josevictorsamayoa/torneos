<html lang="es"><head>
        
        <meta charset="utf-8">
        
        <title> Pagos </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="author" content="wmendez">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&amp;display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&amp;display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/main.css">
        
        <style type="text/css">
            
        </style>
        
        <script type="text/javascript">
        
        </script>
        
    </head>
    
    <body>
       
   <!-- Sidebar-->
    <?php 
        include_once '../app/Views/bodies/sidebar.php';
    ?>
        
    </div>

        <div id="contenedor">
		
            <div id="central">
                <div id="login">
                    <div class="titulo">
                        <img class="logo" src= "../img/paypal.png">
                    </div>
                    <form id="loginform">
                        <input type="text" name="usuario" placeholder="Usuario" required>
                        
                        <input type="password" placeholder="Contraseña" name="password" required>
                        
                        <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                    </form>
                    <div class="pie-form">
                        <a href="#">¿Perdiste tu contraseña?</a>
                        <a href="#">¿No tienes Cuenta? Registrate</a>
                    </div>
					
                </div>
                <div class="inferior">
                    <a href="#">Volver</a>
                </div>
				
            </div>
			
        </div>
         
    
</body>
</html>