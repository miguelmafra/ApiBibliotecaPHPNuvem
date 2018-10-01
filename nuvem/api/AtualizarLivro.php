<?php

    require '../database/connect.php';

    $id                  =   $_POST['id'];
    $titulo              =   $_POST['titulo'];
    $autor               =   $_POST['autor'];

    $insert = "UPDATE `livros` SET `titulo`='$titulo',`autor`='$autor' WHERE id = $id";

    if ($conn->query($insert) === TRUE) {
		header("Location: ../index.php?update=true");
	} else {
		header("Location: ../index.php?update=false");
	}
	die();

?>