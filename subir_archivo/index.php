<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subir archivo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">Subir archivo</h1>
        <form name="form" id="form" method="post" action="index.php" enctype="multipart/form-data">
            <label for="archivo"><b>Seleccione un archivo .CSV</b></label>
            <input type="file" class="form form-control" name="archivo" id="archivo">
            <input type="submit" class="btn btn-success" name="subir" id="subir" value="Subir">
        </form>
    </div>
    <?php
    
    if(isset($_POST["subir"])){
        $nombre = $_FILES["archivo"]["name"];
        $guardado = $_FILES["archivo"]["tmp_name"];
        $tipo_archivo = $_FILES['archivo']['type'];
        /*date_default_timezone_set("America/Lima");
        $fecha = date("d-m-Y G:i a");*/

        if(strpos($tipo_archivo, "csv") || strpos($tipo_archivo, "xlsx")){
            if(!file_exists("archivos_excel")){
                mkdir("archivos_excel",0777,true); // Crea la carpeta, permiso, true
                if(file_exists("archivos_excel")){
                    if(move_uploaded_file($guardado, 'archivos_excel/'.$nombre)){
                        echo "Archivo guardado correctamente";
                    }else{
                        echo "Error al guardar";
                    }
                }
            }else{
                if(move_uploaded_file($guardado, 'archivos_excel/'.$nombre)){
                    echo "Archivo guardado correctamente";
                }else{
                    echo "Error al guardar";
                }
            }
        }else{
            echo "Archivo incorrecto";
        }
    }
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>