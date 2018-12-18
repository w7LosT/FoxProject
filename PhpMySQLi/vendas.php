<!doctype html>
<?php
    include 'database.php';
    $tabela = "vendas";
    $params = "ORDER BY id";
    $consulta = dbRead($tabela, $params);
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Projeto/node_modules/bootstrap/compiler/bootstrap.css"/>
    <link rel="stylesheet" href="Projeto/node_modules/bootstrap/compiler/style.css"/>
    <link rel="stylesheet" href="css/estilo.css"/>

    <title>Fox IoT</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg bg-dark">
          <div class="container">
            <a class="navbar-brand" href="#"><span style="color: white;">Fox IoT</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar nav" id="menu">
                    <li class="nav-item">
                        <a class="nav-link" href="estoque.php">Estoque</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vendas.php">Vendas</a>
                    </li>
                </ul>
            </div>
         </div> 
      </nav>
      
      <div class="container" id="tabela">
          <table class="table table-hover table-dark mt-5" id="dados-estoque">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Id Produto</th>
                      <th scope="col">Quantidade</th>
                      <th scope="col">Unidade</th>
                      <th scope="col">Preço</th>
                      <th scope="col">Data</th>
                      <th scope="col">Hora</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  foreach($consulta as $dados){ ?>
                        <tr>
                          <td><?php echo $dados["id"]; ?></td>
                          <td><?php echo $dados["idproduto"]; ?></td>
                          <td><?php echo $dados["quantidade"]; ?></td>
                          <td><?php echo $dados["unidade"]; ?></td>
                          <td><?php echo $dados["preco"]; ?></td>
                          <td><?php echo $dados["data"]; ?></td>
                          <td><?php echo $dados["hora"]; ?></td>
                        </tr>
                    <?php } ?> 
                  </tbody>
              </table>
          
          <footer id="rodape">
              <a href="#"><span style="margin-right: 5px;">Facebook</span></a> | <a href="#"><span style="margin-left: 5px;">Twitter</span></a>
          </footer>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="Projeto/node_modules/jquery/dist/jquery.js"></script>
    <script src="Projeto/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="Projeto/node_modules/bootstrap/dist/js/bootstrap.js"></script>
  </body>
</html>
