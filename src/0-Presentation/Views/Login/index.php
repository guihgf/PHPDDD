<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?=$GLOBALS['base_site'].'public/bootstrap/bootstrap.min.css'?>">
        <link rel="stylesheet" href="<?=$GLOBALS['base_site'].'public/css/estilos.css'?>">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="body-login-cadastro">
        <div class="content">
            <div class="row">
                <div id="login-box" class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Bem Vindo(a)! Preencha os campos abaixo, caso não possua usuário, <a href="#" style="color:#337ab7">clique aqui.</a></h3>
                        </div>
                        <div class="panel-body">
                            <form action="autenticar" method="POST" role="form">
                                <div class="col-md-12 text-center">
                                    <img src="<?=$GLOBALS['base_site'].'public/images/up_menu.jpg'?>">
                                </div>
                                <div class="form-group">
                                    <label for="">E-mail:</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu e-mail aqui...">
                                </div>

                                <div class="form-group">
                                    <label for="">Senha:</label>
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha aqui...">
                                </div>

                                <a href="#"> Esqueceu a senha?</a>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- jQuery -->
        <script src="<?=$GLOBALS['base_site'].'public/jquery/jquery-latest.min.js'?>"></script>
        <!-- Bootstrap JavaScript -->
        <script src="<?=$GLOBALS['base_site'].'public/bootstrap/bootstrap.min.js'?>"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    </body>
</html>