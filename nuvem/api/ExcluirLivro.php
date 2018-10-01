<?php

    require '../database/connect.php';

    $id              =   $_GET['id'];

    $insert = "DELETE FROM `livros` WHERE id = $id";

    if ($conn->query($insert) === TRUE) {
		header("Location: ../index.php?delete=true");
	} else {
		header("Location: ../index.php?delete=false");
	}
	die();

?>