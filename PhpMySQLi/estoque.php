<!doctype html>
<?php 
    session_start();
    include 'database.php';
    include 'consumirApi.php';
    $sessao = $_SESSION['user'];
    $con = qExecute("SELECT id_tabela FROM users WHERE user = '".$sessao."'");
    $res = mysqli_fetch_assoc($con);
    $idTabela = $res['id_tabela'];
    $tabela = $idTabela."_estoque";
    $params = "ORDER BY codigo";
    $consulta = dbRead($tabela);
    
    if(isset($consulta)){
        
    } else {
        $consulta = getEstoque();
    }
?>
<html lang="pt-br">
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
      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
          <div class="container">
              <a class="navbar-brand h1 sb-0" href="#" ><span style="color: white;">Fox IoT</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-right" id="navbarSite">
                <ul class="navbar nav" mr-auto id="menu">
                    <li class="nav-item">
                        <a class="nav-link" href="estoque.php">Estoque</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vendas.php">Vendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Sair</a>
                    </li>
                </ul>
            </div>
         </div> 
      </nav>
      
      <div class="container" id="principal">
            <div class="container" id="tabela">
                <table class="table table-hover table-dark mt-5" id="dados-estoque">
                        <thead>
                          <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Unidade</th>
                            <th scope="col">Preço</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                          <?php foreach($consulta as $dados){ ?>
                              <tr>
                                <td><?php echo $dados['codigo']; ?></td>
                                <td><?php echo $dados['nome']; ?></td>
                                <td><?php echo $dados['quantidade']; ?></td>
                                <td><?php echo $dados['unidade']; ?></td>
                                <td><?php echo $dados['preco']; ?></td>
                              </tr>
                          <?php } ?> 
                        </tbody>
                    </table>
                <?php print_r($idTabela); ?>
            </div>

            <div id="piechart_3d" style="width: 450px; height: 300px;"></div>

      </div>
            <footer id="rodape">
                <a href="#"><span style="margin-right: 5px;">Facebook</span></a> | <a href="#"><span style="margin-left: 5px;">Twitter</span></a>
                <br/> <span style="text-align: center; font-size: 8pt;">Produced By K_Enconding</span>
            </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="Projeto/node_modules/jquery/dist/jquery.js"></script>
    <script src="Projeto/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="Projeto/node_modules/bootstrap/dist/js/bootstrap.js"></script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            ['Work',     11],
                            ['Eat',      2],
                            ['Commute',  2],
                            ['Watch TV', 2],
                            ['Sleep',    7]
                      ]);

                      var options = {
                            title: 'My Daily Activities',
                            is3D: true,
                      };

                      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                      chart.draw(data, options);
                    }
    </script>
  </body>
</html>