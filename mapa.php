<?php
session_start();
require_once("conexao.php");
require_once("funcoes.php");
permiteUsuario1();
$latitude = filter_input(INPUT_POST, 'lati');
$longitude = filter_input(INPUT_POST, 'longi');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="Imagens/favicon.ico"/>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <title>Telecall - Soluções completas em telefonia e internet</title>
</head>
<body>
<div id="particles-container" oncontextmenu="return false"><script>particlesJS.load('particles-container', 'particlesjs-config.json');</script></div>
    <nav class="navbar navbar-expand-lg bg-light shadow-sm">
        <div class="px-5 d-none d-lg-block"></div>
        <div class="container-fluid"><a class="navbar-brand titulo degradeMovimento" href="<?php echo mudaLink() ?>">
            <img src="Imagens/telecall-icon.png" alt="" width="78.4px" height="78.4px" class="d-inline-block align-text-middle">
                telecall
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav fs-4 text-uppercase">
                <?php mostraBotaoLogout(); mostraBotaoCadastro() ?>
                    <li class="nav-item degradeMovimento">
                    <a class="nav-link" href="modelagem.php">Modelo de dados</a>
                    </li>
                    <li class="nav-item degradeMovimento">
                    <a class="nav-link" href="queries.php">Queries SQL</a>
                    </li>
                </ul>
                <div class="pe-5 d-none d-lg-block"></div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10 col-xxl-9 mx-auto mt-5">
                <div class="card rounded-0 border-0 shadow" style="height:600px">
                    <div class="card-body">
                        <?php mostraMudanca() ?>
                        <div id="googleMap"></div>
                            <script>
                                function myMap() {
                                    var mapProp= {
                                    center:new google.maps.LatLng(<?php echo $latitude ?>,<?php echo $longitude ?>),
                                    zoom:16,
                                    };
                                    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                                }
                            </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIUbPhPr8a86xKFrXsXbA6RWQKdsMuvs8&callback=myMap"></script>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>