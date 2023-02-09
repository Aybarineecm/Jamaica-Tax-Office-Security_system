<?php

function sanitizeData($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=strip_tags($data);
	$data=htmlspecialchars($data);
	return $data;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$gid = sanitizeData($_POST['ac']);
    $firstname = sanitizeData($_POST['firstname']);
	$lastname = sanitizeData($_POST['lastname']);
	$department = sanitizeData($_POST['department']);
  $floorno = sanitizeData($_POST['floor']);
	
;
}

?>