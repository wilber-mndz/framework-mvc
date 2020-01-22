<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo RUTE_URL ?>/css/bootstrap.min.css">
    <title>Framework MVC</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <form action="<?php echo RUTE_URL?>/recibir" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Enviar">    
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>