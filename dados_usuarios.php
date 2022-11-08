<?php
    session_start();
    require_once("conexao.php");
    require_once("funcoes.php");
    permiteUsuario1();
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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-11 mx-auto">
            <div class="card rounded-0 border-0 shadow mt-5">
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <div class="table-hover">
                            <table class="table table-hover text-black  caption-top">
                            <caption class="text-dark">Registros de usuários</caption>
                                <thead class="table-light border-dark border-bottom border-3">
                                    <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Login</th>
                                    <th scope="col">Tipo de usuário</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Nascimento</th>
                                    <th scope="col">Nome materno</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Telefone fixo</th>
                                    <th scope="col">Endereço</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $busca = "SELECT us.usu_id, us.usu_login, tu.tipo_usu_desc, us.usu_nome, us.usu_nascimento, us.usu_nomemat, us.usu_cpf, us.usu_celular, us.usu_fixo, us.usu_endereco
                                        FROM usuario AS us JOIN tipo_usuario as tu ON us.tipo_usu_id = tu.tipo_usu_id ORDER BY us.usu_id";

                                        $_SESSION['busca'] = $busca;

                                        $total_reg = "8"; // número de registros por página
                                        @$pagina=$_GET['pagina'];
                                        if (!$pagina) {

                                            $pc = "1";
                                        } 
                                        else {
                                            $pc = $pagina;
                                        }
                                        $inicio = $pc - 1;
                                        $inicio = $inicio * $total_reg;
                                        $limite = mysqli_query($conexao, "$busca LIMIT $inicio, $total_reg");
                                        $todos = mysqli_query($conexao, "$busca");

                                        $tr = mysqli_num_rows($todos); // verifica o número total de registros
                                        $tp = $tr / $total_reg; // verifica o número total de páginas

                                        while ($dados = mysqli_fetch_array($limite)) {              //xxxxxxx
                                            
                                            echo '<tr>';
                                            echo '<td>'.$dados["usu_id"].'</td>';
                                            echo '<td>'.$dados["usu_login"].'</td>';
                                            echo '<td>'.$dados["tipo_usu_desc"].'</td>';
                                            echo '<td>'.$dados["usu_nome"].'</td>';
                                            echo '<td>'.$dados["usu_nascimento"].'</td>';
                                            echo '<td>'.$dados["usu_nomemat"].'</td>';
                                            echo '<td>'.$dados["usu_cpf"].'</td>';
                                            echo '<td>'.$dados["usu_celular"].'</td>';
                                            echo '<td>'.$dados["usu_fixo"].'</td>';
                                            echo '<td>'.$dados["usu_endereco"].'</td>';
                                            echo '</tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                <div class="card rounded-0 border-0 shadow">
                    <div class="card-body">
                        <form action="" method="GET" >
                            <div class="text-center d-grid gap-2 col-6 mx-auto d-md-block">
                                <div class="input-group mb-3">
                                    <label for="1" class="col-form-label col-form-label-lg fs-4 px-3">Página</label>
                                    <input type="text" name="pagina" class="form-control col-xs-1" id="1" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $pc ?>">
                                    <button class="btn btn-outline-primary" name="btnPag" type="submit" id="button-addon2">Ir</button><div class="col-form-label col-form-label-md fs-4 px-3">de <?php echo ceil($tp) ?></div>
                                </div>
                                <a href="dados_acesso_1.php" class="btn btn-outline-primary mx-2 rounded-0" name="btnPlanilha" type="button" id="button-addon2" aria-label="Recipient's username" aria-describedby="button-addon2">Registros de acesso</a>
                                <a href='logout.php' type="button" name="botaoLogout" class="btn btn-outline-primary mx-2 rounded-0" >Deslogar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>