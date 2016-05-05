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
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="cabecera">Backlog</div>
                    <div class="relleno">
                        <div class="cajamovil">            
                            <h4>nombre: asd</h4>
                            <p>valor 5</p>
                            <button id="btnVerMas" class="btn btn-ms btn-primary" type="submit" value="enviar">ver más</button>
                        </div>
                        <div class="cajamovil">            
                            <h4>nombre: dsa</h4>
                            <p>valor 10</p>
                            <button id="btnVerMas" class="btn btn-ms btn-primary" type="submit" value="enviar">ver más</button>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2">
                    <div class="cabecera">Sprints</div>
                    <div class="relleno">Relleno</div>     
                </div>
                <div class="col-lg-2">
                    <div class="cabecera">Por hacer</div>
                    <div class="relleno">Relleno</div> 
                </div>
                <div class="col-lg-2">
                    <div class="cabecera">En proceso</div>
                    <div class="relleno">Relleno</div> 
                </div>
                <div class="col-lg-2">
                    <div class="cabecera">Hecho</div>
                    <div class="relleno">Relleno</div> 
                </div>
                <div class="col-lg-2" id="botonesTabla">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Añadir HU</button>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Atras</button>
                </div>
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