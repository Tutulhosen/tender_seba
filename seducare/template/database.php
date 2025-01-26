<?php
	// $con = mysqli_connect("localhost", "root", "", "seducare");
 //    echo mysqli_error($con);

 //    mysqli_set_charset($con,"utf8");

 //    $sql_clnt = "SELECT * FROM client WHERE client_type = 'education-sector' ORDER BY sort_order ASC";
 //    $client_result = mysqli_query($con, $sql_clnt);
 //    echo mysqli_error($con);

	$con = mysqli_connect("localhost", "scouts_ms_root", "ebNh1KA3fJ", "scouts_mysoft");
    echo mysqli_error($con);

    mysqli_set_charset($con,"utf8");

    $sql = "SELECT * FROM client WHERE client_type = 'education-sector' ORDER BY sort_order ASC";

    $result = mysqli_query($con, $sql);

    echo mysqli_error($con);
?>