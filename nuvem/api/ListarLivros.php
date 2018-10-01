<?php

    require '../database/connect.php';

    $insert = "SELECT * FROM livros";

    $result = mysqli_query ($conn, $insert);
	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
	    $rows[] = $r;
	}
	echo json_encode($rows);
	die();

?>