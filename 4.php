<?php
$id = $_GET['id'];
$dato = $_GET['dato'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Juego de preguntas</title>
    <link rel="icon" type="image/png" href="imagenes/favicon.ico" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    html {
        height: 100%;
    }

    body {
        margin: 0;
        padding: 0;
        min-height: 100%;
        box-sizing: border-box;
    }

    .contenedor-4 {
        background: url(img/fondo-33.jpg);
        position: fixed;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-recargate-4 {
        display: flex;
        justify-content: space-between;
        margin-top: 2rem;
    }

    .logo-pequenio {
        width: 200px;
        position: absolute;
        left: 0;
    }

    .logo-fanalca-4 {
        width: 100px;
        position: absolute;
        right: 0;
    }

    .logo-recargate-4 {
        width: 200px;
    }

    .contenedor-recargate {
        display: flex;
        justify-content: center;
    }

    .my_row {
        display: grid;

    }

    .border-vertical,
    .border-vertical-2,
    .border-vertical-3,
    .border-vertical-4 {
        display: grid;
        align-content: center;
        justify-items: center
    }

    .border-vertical,
    .border-vertical-3 {
        border-right: 2px solid #fff;
    }

    .border-vertical-3,
    .border-vertical-4 {
        border-top: 2px solid #fff;
    }

    .contenedor_preguntas {
        position: relative;
    }

    .btn_puntajes {
        background: none;
        border: none;
    }

    .btn_puntajes:focus {
        border: none;
    }

    .contenedor_preguntas {
        position: relative;
    }

    .img-22 {
        width: 300px;
    }

    .numero-encima {
        position: absolute;
        top: 6%;
        left: 5%;
        font-size: 1.3rem;
        color: white;
        font-weight: 900;
        font-style: italic;
    }

    .img-22 {
        width: 300px;
    }

    .btn_puntajes .numero_respuesta {
        color: white;
        font-family: var(--font-sans);
        font-weight: 700;
        font-size: .8rem;
        font-style: italic;
        transition: transform 0.3s ease;
        margin: 0 .3rem;
    }

    .btn_puntajes .numero_respuesta:hover {
        transform: scale(1.2);
    }

    .pregunta-encima {
        position: absolute;
        top: 52%;
        left: 8%;
        font-size: .7rem;
        color: white;
        font-weight: 800;
        font-style: italic;
        padding-right: 3rem !important;
        -webkit-text--width: 0px;
        text-shadow: -2px 0px 5px rgba(250, 255, 94, 0.75);

    }

    .tiempo-encima {
        position: absolute;
        top: 28%;
        left: 89%;
        font-size: .8rem;
        color: white;
        font-weight: 900;

    }

    .swal2-popup {
        background-image: url('img/fondo-33.png');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .swal2-success-circular-line-left,
    .swal2-success-fix,
    .swal2-success-circular-line-right,
    .swal2-styled.swal2-confirm {
        background: none !important;
    }

    .swal2-success-line-long,
    .swal2-success-line-tip {
        background-color: #FF2E22 !important;
    }

    .swal2-success-line {
        border-color: #FF2E22 !important;
    }

    .swal2-icon.swal2-success .swal2-icon.swal2-succes {
        border-color: #FF2E22 !important;
        color: #FF2E22 !important;
    }

    .swal2-icon.swal2-success .swal2-success-ring {
        border-color: #FF2E22 !important;
    }

    .swal2-styled.swal2-confirm {
        background-color: #FF2E22 !important;
        color: white !important;
        font-weight: 700;
    }

    .swal2-title {
        color: white;
        font-weight: 900;
    }

    .swal2-cancel:focus,
    .swal2-confirm:active {
        outline: none !important;
    }

    .swal2-html-container {
        color: white;
    }

    :focus {
        outline: none;
    }

    @media (max-width:575px) {
        .my_row {
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 1fr);
        }
    }

    @media (min-width:576px) {
        .my_row {
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: 1fr;
        }

        .numero-encima {
            top: 20%;
            left: 6%;
        }

        .img-22 {
            width: 530px;
        }

        .logo-pequenio {
            width: 300px;
        }

        .logo-fanalca-4 {
            width: 150px;
        }

        .border-vertical-2 {
            border-right: 2px solid #fff;
        }

        .border-vertical-3,
        .border-vertical-4 {
            border-top: none;
        }

        .pregunta-encima {
            top: 52%;
            left: 8%;
            font-size: 1.2rem;
            padding-right: 5rem !important;
        }

        .tiempo-encima {
            top: 25%;
            left: 88%;
            font-size: 1.5rem;
        }


    }

    @media (min-width:768px) {

        .numero-encima {
            top: 16%;
            left: 6%;
            font-size: 2rem;
        }

        .img-22 {
            width: 700px;
        }

        .logo-recargate-4 {
            width: 420px;
        }

        .pregunta-encima {
            top: 55%;
            left: 8%;
            font-size: 1.5rem;
            padding-right: 5rem !important;
        }

        .logo-pequenio {
            width: 400px;
        }

        .logo-fanalca-4 {
            width: 200px;
        }

        .tiempo-encima {
            top: 26%;
            left: 88%;
            font-size: 2rem;
        }

        .btn_puntajes .numero_respuesta {
            font-size: 1rem;
        }
    }

    @media (min-width:1200px) {
        .contenedor-4 {
            height: 100%;
        }

        .numero-encima {
            top: 18%;
            left: 6%;
            font-size: 2.5rem;
        }

        .pregunta-encima {
            top: 65%;
            left: 8%;
            font-size: 1.8rem;
            padding-right: 4rem !important;
        }

        .logo-pequenio {
            width: 400px;
        }

        .logo-fanalca-4 {
            right: 5%;
        }

        .img-22 {
            width: 920px;
        }

        .logo-recargate-4 {
            width: 500px;
        }

        .logo-pequenio {
            top: 10%;
        }

        .logo-fanalca-4 {
            top: 9%;
        }

        .tiempo-encima {
            top: 26%;
            font-size: 2.5rem;
        }

        .btn_puntajes .numero_respuesta {
            font-size: 1.3rem;
        }
    }

    @media (min-width:1500px) {
        .numero-encima {
            top: 20%;
            left: 6%;
            font-size: 3rem;
        }

        .pregunta-encima {
            top: 65%;
            left: 8%;
            font-size: 2.3rem;
            padding-right: 5rem !important;
        }

        .img-22 {
            width: 1200px;
        }

        .tiempo-encima {
            top: 24%;
            left: 87.8%;
            font-size: 3.5em;
        }

        .btn_puntajes .numero_respuesta {
            font-size: 1.5rem;
        }
    }
</style>

<body>
    <div class="contenedor-4 py-5">
        <div class="contendor_general">
            <div class="">
                <div class=""><img src="img/yuasa-novelbat-logo-pequenio.png" alt="" class="logo-pequenio"></div>
                <div class=""><img src="img/FANALCA_LOGO.png" alt="" width="220px" class="logo-fanalca-4"></div>
            </div>
            <div class="contenedor-recargate">
                <div class="d-flex justify-content-center">
                    <img src="img/logo-recargate.png" alt="" class="logo-recargate-4">
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center m-0 p-0">
                <div class="contenedor_preguntas m-0 p-0" id="contenedor_preguntas">
                    <img src="img/22.png" alt="" class="img-22">
                    <h4 class="numero-encima m-0 p-0" id="numero">1</h4>
                    <div class="contenendor-pregunta" id="contenedor-pregunta">
                        <h4 class="pregunta-encima text-center p-0 m-0" id="pregunta">
                            ¿En qué año se crea Yuasa Battery Manufacturing?</h4>
                    </div>
                    <h3 class="tiempo-encima m-0 p-0" id="reloj">20</h3>
                </div>
            </div>
            <div class="col-12 col-sm-12 container align-items-center align-self-center container">
                <div class="row ">
                    <div class="col-6 col-md-3 d-sm-flex flex-sm-column justify-content-center align-items-center  m-0 p-0 border-vertical pb-1">
                        <img src="img/27.png" alt="" width="100px">
                        <button class="btn_puntajes m-0 p-0 ">
                            <br>
                            <span class="numero_respuesta d-flex justify-content-center px-3 py-2" id="btn1" onclick="oprimir_btn(0)" style="border-radius: 30px;">0</span>
                        </button>
                    </div>
                    <div class="col-6 col-md-3 d-sm-flex m-0 p-0  flex-sm-column justify-content-center align-items-center border-vertical-2 pb-1">
                        <img src="img/28.png" alt="" width="100px">
                        <button class="btn_puntajes m-0 p-0 ">
                            <br>
                            <span class="numero_respuesta d-flex justify-content-center px-3 py-2" id="btn2" onclick="oprimir_btn(1)" style="border-radius: 30px;">0</span>
                        </button>
                    </div>
                    <div class="col-6 col-md-3 d-sm-flex m-0 p-0  flex-sm-column justify-content-center align-items-center   border-vertical-3 pb-1">
                        <img src="img/29.png" alt="" width="100px">
                        <button class="btn_puntajes m-0 p-0 ">
                            <br>
                            <span class="numero_respuesta d-flex justify-content-center px-3 py-2" id="btn3" onclick="oprimir_btn(2)" style="border-radius: 30px;">0</span>
                        </button>
                    </div>
                    <div class="col-6 col-md-3 d-sm-flex m-0 p-0 align-items-center justify-content-center flex-sm-column border-vertical-4 pb-1">
                        <img src="img/30.png" alt="" width="100px">
                        <button class="btn_puntajes m-0 p-0 ">
                            <br>
                            <span class="numero_respuesta d-flex justify-content-center px-3 py-2" id="btn4" onclick="oprimir_btn(3)" style="border-radius: 30px;">0</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- area de programacion -->
    <div class="contenedor" id="contenedor" hidden>
        <div class="puntaje" id="puntaje"></div>
        <div class="categoria" id="categoria" style="display: none;"></div>
        <div class="numero"></div>
        <img src="#" class="imagen" id="imagen">
    </div>
    <input id="id" value="<?php echo $id; ?>" hidden></input>
    <input id="dato" value="<?php echo $dato; ?>" hidden></input>

    <!-- -- -->
    <script>
        function moverTexto() {
            var pregunt = document.getElementById("pregunta").textContent;
            var ePregunt = document.getElementById("pregunta");

            if (pregunt.length > 110) {
                ePregunt.style.top = 27 + "%";
            } else {
                ePregunt.style.top = 45 + "%";
            }
            switch (true) {
                case window.innerWidth > 576:
                    if (pregunt.length < 30) {
                        ePregunt.style.top = "55" + "%";
                        ePregunt.style.left = "25" + "%";
                    } else if (pregunt.length < 60) {
                        ePregunt.style.top = "55" + "%";
                        ePregunt.style.left = "13" + "%";
                    }
                    break;
            }
        }
    </script>

    <!-- -- -->

    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>