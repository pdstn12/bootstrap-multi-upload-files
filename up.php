<?php
$valid_formats = array("jpg", "png", "gif", "jpeg", "bmp");
$x = 0;
foreach ($_FILES['allfil']['name'] as $key => $value) {
	if(in_array(pathinfo($value, PATHINFO_EXTENSION), $valid_formats)){
	move_uploaded_file($_FILES['allfil']['tmp_name'][$key], './'.$value);
	$x++;
	}
}
echo $x." file was uploaded successfuly";