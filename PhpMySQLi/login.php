<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <!--<link rel="stylesheet" href="Projeto/node_modules/bootstrap/compiler/bootstrap.css"/>-->
        <link rel="stylesheet" href="Projeto/node_modules/bootstrap/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="Projeto/node_modules/bootstrap/compiler/style.css"/>
        <link rel="stylesheet" href="css/estilo.css"/>
    </head>
    
    <body>
        <div class="container">
            <div class="row" id="outer">
                <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">
                    <form method="post" action="valida.php">
                        <div class="alert alert-secondary" id="inner">
                            <div class="panel-heading text-center">
                                LOGIN
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="txtMail" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="txtPass" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="btnSend" value="Acess" class="form-control btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="text-center text-danger" style="margin-left: 125px; text-align: justify; width: 230px;">
                        <?php 
                            session_start();
                            if(isset($_SESSION['errorLogin'])){
                                echo $_SESSION['errorLogin'];
                                unset($_SESSION['errorLogin']);
                            }
                            exit();
                        ?>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="Projeto/node_modules/jquery/dist/jquery.js"></script>
        <script src="Projeto/node_modules/popper.js/dist/umd/popper.js"></script>
        <script src="Projeto/node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="Projeto/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>

