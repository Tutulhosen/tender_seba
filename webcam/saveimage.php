<?php
	$filename = time() . '.jpg';
	$filepath = 'saved_images/';

	move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);

	echo $filepath.$filename;

?>