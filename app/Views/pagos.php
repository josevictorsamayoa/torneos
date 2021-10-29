<html lang="es"><head>
        
        <meta charset="utf-8">
        
        <title> Pagos </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="author" content="wmendez">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&amp;display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&amp;display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="main.css">
        
        <style type="text/css">
            
        </style>
        
        <script type="text/javascript">
        
        </script>
        
    </head>
    
    <body>
       
    <div class="wrapper">
     <!--Top Menu & Menu button-->
 
        <div class="sidebar">
            <div class="profile">
                <!--Profile Image-->
                <img src="logosiu.jpg">
                <!--Profile Title & Descruption-->
                <h3>Los Tukis</h3>
                <p>Admin</p>
            </div>
             <!--Menu item-->
             <ul>
                <li>
                    <a href="#" class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Mis Equipos</span>
                    </a>
                </li>
                <li>
                    <a href="torneos.php">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">Mis Torneos</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Fechas</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Tabla</span>
                    </a>
                </li>
                <li>
                    <a href="pagos.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Pagos</span>
                    </a>
                </li>
                <li>
                    <a href="login.php">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">Log out</span>
                    </a>
                </li>
            </ul>
       </div>
        
    </div>
        
    </div>

        <div id="contenedor">
		
            <div id="central">
                <div id="login">
                    <div class="titulo">
                        <img class="logo" src= "paypal.png">
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