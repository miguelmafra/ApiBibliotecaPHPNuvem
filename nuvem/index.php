<?php
    include 'database/connect.php';
    require 'database/connect.php';

    $insert = "SELECT * FROM livros";

    $result = mysqli_query ($conn, $insert);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Biblioteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>

        function updateModal(id, titulo, autor) {
            $("#formId").val('' + id);
            $("#formTitulo").val('' + titulo);
            $("#formAutor").val('' + autor);
        }

    </script>

</head>
<body>

    <div class="container">

<?php
    
    if(isset($_GET['cadastro'])){
        if($_GET['cadastro']){
            ?>
            
            <div class="alert alert-success" role="alert">
                Livro cadastrado com sucesso!
            </div>
            
            <?php
        }
    }

    if(isset($_GET['update'])){
        if($_GET['update']){
            ?>
            
            <div class="alert alert-primary" role="alert">
                Livro atualizado com sucesso!
            </div>
            
            <?php
        }
    }

    if(isset($_GET['delete'])){
        if($_GET['delete']){
            ?>
            
            <div class="alert alert-danger" role="alert">
                Livro excluido com sucesso com sucesso!
            </div>
            
            <?php
        }
    }

?>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">Autor</th>
            <th scope="col">Quantidade de Emprestimos</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $rows = array();
                while($r = mysqli_fetch_assoc($result)) {
                    $rows[] = $r;
                }
                $keys = array_keys($rows);
                for($i = 0; $i < count($rows); $i++){?>
                    <tr>
                        <th scope="row"><?php echo $rows[$i]['id']?></th>
                        <td><?php echo $rows[$i]['titulo']?></td>
                        <td><?php echo $rows[$i]['autor']?></td>
                        <td><?php echo $rows[$i]['quant_emprestimo']?></td>
                        <td><a href="#" class="btn btn-primary text-white" onClick="updateModal('<?php echo $rows[$i]['id']?>','<?php echo $rows[$i]['titulo']?>','<?php echo $rows[$i]['autor']?>')" data-toggle="modal" data-target="#exampleModal">Editar</a></td>
                        <td><a href="api/ExcluirLivro.php?id=<?php echo $rows[$i]['id']?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#cadastroModal">Adicionar Livro</a>
    </div>  

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Livro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form method="POST" action="api/AtualizarLivro.php">
                    <div class="modal-body">
                        <div class="form-group" style="display: none;">
                            <label for="formTitulo">Id</label>
                            <input name="id" type="text" class="form-control" id="formId" aria-describedby="emailHelp" placeholder="Livro Id">
                        </div>
                        <div class="form-group">
                            <label for="formTitulo">Título</label>
                            <input name="titulo" type="text" class="form-control" id="formTitulo" placeholder="Titulo do livro">
                        </div>
                        <div class="form-group">
                            <label for="formAutor">Autor</label>
                            <input name="autor" type="text" class="form-control" id="formAutor" placeholder="Autor do livro">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar livro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form method="POST" action="api/CadastrarLivro.php">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formTitulo">Título</label>
                            <input name="titulo" type="text" class="form-control" id="formTitulo" placeholder="Titulo do livro">
                        </div>
                        <div class="form-group">
                            <label for="formAutor">Autor</label>
                            <input name="autor" type="text" class="form-control" id="formAutor" placeholder="Autor do livro">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

<?php die(); ?>