<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Corretores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
      <?php include('mensagem.php'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
          <div class="card-header">
              <h4>ADICIONAR CORRETOR
              </h4>
            </div>
            <div class="card-body">
              <form action="acoes.php" method="POST">
                <div class="mb-3">
                  <label>Nome</label>
                  <input type="text" name="nome" class="form-control">
                </div>
                <div class="mb-3">
                  <label>CPF</label>
                  <input type="text" name="cpf" class="form-control">
                </div>
                <div class="mb-3">
                  <label>CRECI</label>
                  <input type="text" name="creci" class="form-control">
                </div>
                
                <div class="mb-3">
                  <button type="submit" name="create_corretor" class="btn btn-primary">Enviar</button>
                </div>
              </form>
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
                    <th>Ações</th>
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
                    <td>
                      <a href="corretor-edit.php?id=<?=$corretor['id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                      <form action="acoes.php" method="POST" class="d-inline">
                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_corretor" value="<?=$corretor['id']?>" class="btn btn-danger btn-sm">
                          <span class="bi-trash3-fill"></span>&nbsp;Excluir
                        </button>
                      </form>
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