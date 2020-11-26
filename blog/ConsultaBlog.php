<?php
require_once "../servico/autentica.php";
require_once "../componentes/post.php"; // estruturaPost()
include_once "../servico/Bd.php";

$_SESSION["pagina"] = "blog";

/*
$post = "
<div class='col-4'>
  <div class='card mb-3'>
    <div class='card-body'>
      <input type='hidden' name='id' value=':id'>
      <h5 class='card-title'>:title</h5>
      <p class='card-text'>:corpo</p>
      <div class='row'>
        <div class='col'>
          <a href='AlterarBlog.php?id=:id' class='btn btn-info btn-sm btn-block'>Alterar</a>
        </div>
        <div class='col'>
          <a href='#' onclick='pergunta(:id)' class='btn btn-danger btn-sm btn-block'>Excluir</a>
        </div>
      </div>
    </div>
  </div>
</div>
";
*/
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  </head>
  <body>
    <?php include "../componentes/Navbar.php"; ?>
    <div class="container">
      <h1>Tela do Blog</h1>
      <hr>
      <a href="../menu.php"> < Voltar </a>
      <!-- TODO: alterar -->
      <br><br> 
      
      <a class="btn btn-primary" href="IncluirBlog.php" role="button">novo Post</a>
      <!-- TODO: alterar -->
      <br><br>
      
      <div class="row row-cols-3 justify-content-around">
        <?php
          $bd = new Bd();
          $sql = "select b.id, b.titulo, b.corpo, u.login from blog b join usuario u on b.id_usuario = u.id";
          foreach ($bd->query($sql) as $row) {
              estruturaPost($row["titulo"], $row["corpo"], $row["id"], $row["login"]);
          }
        ?>
      </div>
    </div>
    
    
    <script>
        function pergunta(id) {
            let resp = confirm("Deseja realmente excluir este Post?");
            if (resp) {
                window.location.replace("ExcluirBlog.php?id=" + id);
            }
        }
    </script>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
     
  </body>
</html>