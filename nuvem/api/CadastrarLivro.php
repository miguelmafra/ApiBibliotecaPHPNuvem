<?php

    require '../database/connect.php';

    $titulo              =   $_POST['titulo'];
    $autor               =   $_POST['autor'];
    $quant_emprestimo    =   0;

    $insert = "INSERT INTO `livros`(`titulo`, `autor`, `quant_emprestimo`) VALUES ('$titulo', '$autor', '$quant_emprestimo')";

    if ($conn->query($insert) === TRUE) {
		header("Location: ../index.php?cadastro=true");
	} else {
		header("Location: ../index.php?cadastro=false");
	}
	die();

?>