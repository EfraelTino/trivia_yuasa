<?php
$id = $_GET['id'];
$dato = $_GET['dato'];
$puntos = $_GET['puntos'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Redimir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="felicitaciones justify-content-center d-flex align-items-end">
        <div class="parent-puntajes py-5">
            <div class="container my-3">
                <div class="row mx-2">
                    <div class="col-12 m-0 p-0 container align-self-center ">
                        <div class="row">
                            <div class="col-12 col-lg-6 d-none d-lg-flex  "><img src="img/yuasa-novelbat-logo-pequenio.png" alt="" width="620px" class="logo-pequenio"></div>

                            <div class="col-12 d-flex justify-content-center text-white mt-5 ">
                                <h1 class="text-felicitaciones" id="titulo">
                                    ¡FELICITACIONES!
                                </h1>
                            </div>
                            <div class="col-12 col-md-6  d-flex justify-content-center " ;>
                                <div class="total_puntaje" id="contenedor">
                                    <img src="img/3.png" alt="" class="primero">
                                    <img src="img/19.png" alt="" class="segundo encima" id="imagen">
                                    <p class="texto-encima" id="etiqueta">UN TERMO</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-end">
                                <div class="btn_container_redimir">
                                    <button class="btn_redimir" id="redimir" onclick="abrir()">
                                        Redimir premio
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input id="id" value="<?php echo $id; ?>" hidden></input>
    <input id="dato" value="<?php echo $dato; ?>" hidden></input>
    <input id="puntos" value="<?php echo $puntos; ?>" hidden></input>
    </div>
    <script>
        var puntos = document.getElementById("puntos").value;
        var id = document.getElementById("id").value;
        var etiqueta = document.getElementById("etiqueta");
        var redimir = document.getElementById("redimir");
        var contenedor = document.getElementById("contenedor");
        var premio = "";
        cambioImagen();

        function cambioImagen() {
            if (puntos > 900) {
                document.getElementById("imagen").src = "img/18.png";
                premio = "TERMO";
                etiqueta.innerHTML = premio;
            } else {
                document.getElementById("imagen").src = "img/20.png";
                document.getElementById("titulo").innerHTML = "LO SIENTO NO HAY PREMIOS DISPONIBLES";
                contenedor.style.display = "none";
                redimir.style.display = "none";
            }
        };

        function abrir() {
            window.location.href = "registro.php?id=" + id + "&puntos=" + puntos + "&premio=" + premio;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>