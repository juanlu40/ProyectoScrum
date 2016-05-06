<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProyectoScrum</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../Controlador/CSS/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- CUSTOM CSS -->
    <link href="../Controlador/CSS/custom.css" rel="stylesheet">
 
 
  </head>
  <body>
        <div class="container" id="indexcontainer">
             <div class="row">
                 <div class="col-lg-4"></div>
                 <div class="col-lg-4"><img id="logoProyectos" src="../Controlador/Recursos/logo.png" /></div>
                 <div class="col-lg-4"></div>
             </div>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle btn-lg btn-primary btn-block" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Proyectos
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu btn-block" aria-labelledby="dropdownMenu1" >
                  <li role="separator" class="divider"></li>
                  <li><a href="Tabla.php" class="cajaProyectos">Proyecto 1</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="Tabla.php" class="cajaProyectos">Proyecto 2</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="Tabla.php" class="cajaProyectos">Proyecto 3</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="Tabla.php" class="cajaProyectos">Proyecto 4</a></li>
                  <li role="separator" class="divider"></li>
                </ul>
              </div>
        </div> 
 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    
    <script src="../Controlador/JavaScript/bootstrap.min.js"></script>
     <script src="../Controlador/JavaScript/custom.js"></script>
  </body>
</html>
