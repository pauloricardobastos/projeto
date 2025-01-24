<?php

require 'conexao.php';

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Corretor - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
    <?php include('mensagem.php'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Editar CORRETOR
                <a href="index.php" class="btn btn-danger float-end">Cancelar edição</a>
              </h4>
            </div>
            <div class="card-body">
              <?php
              if (isset($_GET['id'])) {
                $corretor_id = mysqli_real_escape_string($conexao, $_GET['id']);
                $sql = "SELECT * FROM corretor WHERE id='$corretor_id'";
                $query = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($query) > 0) {
                  $corretor = mysqli_fetch_array($query);
              ?>
              <form action="acoes.php" method="POST">
                <div class="mb-3">
                  <label>ID</label>
                  <input type="text" name="id" value="<?=$corretor['id']?>" class="form-control" readonly>
                </div>
                <div class="mb-3">
                  <label>Nome</label>
                  <input type="text" name="nome" value="<?=$corretor['nome']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>CPF</label>
                  <input type="text" name="cpf" value="<?=$corretor['cpf']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>creci</label>
                  <input type="text" name="creci" value="<?=$corretor['creci']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <button type="submit" name="update_corretor" class="btn btn-primary">Salvar</button>
                </div>
              </form>
              <?php
              } else {
                echo "<h5>Corretor não encontrado</h5>";
              }
            }
            ?>
            </div>
            <div class="card-header">
              <h4> Lista de Corretores
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>CRECI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = 'SELECT * FROM corretor';
                  $corretores = mysqli_query($conexao, $sql);
                  if (mysqli_num_rows($corretores) > 0) {
                    foreach($corretores as $corretor) {
                  ?>
                  <tr>
                    <td><?=$corretor['id']?></td>
                    <td><?=$corretor['nome']?></td>
                    <td><?=$corretor['cpf']?></td>
                    <td><?=$corretor['creci']?></td>
                    </td>
                  </tr>
                  <?php
                  }
                 } else {
                   echo '<h5>Nenhum corretor encontrado</h5>';
                 }
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>