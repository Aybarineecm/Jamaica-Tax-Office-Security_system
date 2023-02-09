<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
$host = 'localhost';
$dbusername = 'project_user';
$dbpassword = 'password123';
$dbname = 'taj';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $dbusername, $dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function sanitizeData($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=strip_tags($data);
	$data=htmlspecialchars($data);
	return $data;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$gid = sanitizeData($_POST['id']);
    $firstname = sanitizeData($_POST['firstname']);
	$lastname = sanitizeData($_POST['lastname']);
	$purpose = sanitizeData($_POST['purpose']);
	$floorno;
	$purposestr="";
	date_default_timezone_set("America/Jamaica");
	$dateandtime=date('d-m-y h:i:s');
	$visitorinfo=array();
	$visitorson8=array();
	$visitorson12=array();
	$visitorson6=array();
	$visitorson9=array();
	$visitoron6num=0;
	$visitoron8num=0;
	$visitorson9num=0;
	$visitoron12num=0;
	$visitors=array();
  include "visitorticketcode.php";

	if($purpose==="Accounts"){
		$floorno=8;
		if(count($visitorson8)==0){
			$tid=$floorno.$tid;
			$visitorinfo=array("tid"=>$tid,"Visitor Name"=>$firstname." ".$lastname,"Floor Number"=>$floorno,"Purpose"=>$purpose, "Date and Time of Entry"=>$dateandtime);
			array_push($visitorson8,$visitorinfo);
			array_push($visitors,$visitorinfo);
		}elseif(count($visitorson8)>1 && count($visitorson8)<20){
			$tid=$floorno.$tid;
			$visitorinfo=array("tid"=>$tid,"Visitor Name"=>$firstname." ".$lastname,"Floor Number"=>$floorno,"Purpose"=>$purpose, "Date and Time of Entry"=>$dateandtime);
			array_push($visitorson8,$visitorinfo);
			array_push($visitors,$visitorinfo);
		}else{
			$tid=$floorno.$tid;
			$visitorinfo=array("tid"=>$tid,"Visitor Name"=>$firstname." ".$lastname,"Floor Number"=>$floorno,"Purpose"=>$purpose, "Date and Time of Entry"=>$dateandtime,"Comment"=>"Please wait. Your number will be called shortly.");
			array_push($visitorson8,$visitorinfo);
			array_push($visitors,$visitorinfo);
		}	
	}elseif($purpose==="Human Relations"){
		$floorno=12;
		$purposestr="HR";
		if(count($visitorson12)==0){
			$tid=$floorno.$tid;
			$visitorinfo=array("tid"=>$tid,"Visitor Name"=>$firstname." ".$lastname,"Floor Number"=>$floorno,"Purpose"=>$purpose, "Date and Time of Entry"=>$dateandtime);
			array_push($visitorson12,$visitorinfo);
			array_push($visitors,$visitorinfo);
		}elseif(count($visitorson12)>0 and count($visitorson12)<20){
			$tid=$tid=$floorno.$tid;
			$visitorinfo=array("tid"=>$tid,"Visitor Name"=>$firstname." ".$lastname,"Floor Number"=>$floorno,"Purpose"=>$purpose, "Date and Time of Entry"=>$dateandtime);
			array_push($visitorson12,$visitorinfo);
			array_push($visitors,$visitorinfo);
		}else{
			$tid=$floorno.$tid;
			$visitorinfo=array("tid"=>$tid,"Visitor Name"=>$firstname." ".$lastname,"Floor Number"=>$floorno,"Purpose"=>$purpose, "Date and Time of Entry"=>$dateandtime,"Comment"=>"Please wait. Your number will be called shortly.");
			array_push($visitorson12,$visitorinfo);
			array_push($visitors,$visitorinfo);
		}
	}elseif($purpose==="Auditing"){
		$purposestr="AU";
		if(count($visitorson6)==0){
			$floorno=6;
			$tid=$floorno.$tid;
			$visitorinfo=array("tid"=>$tid,"Visitor Name"=>$firstname." ".$lastname,"Floor Number"=>$floorno,"Purpose"=>$purpose, "Date and Time of Entry"=>$dateandtime);
			array_push($visitorson6,$visitorinfo);
			array_push($visitors,$visitorinfo);
		}elseif(count($visitorson6)>0 && count($visitorson6)<20){
			$floorno=6;
			$tid=$floorno.$tid;
			$visitorinfo=array("tid"=>$tid,"Visitor Name"=>$firstname." ".$lastname,"Floor Number"=>$floorno,"Purpose"=>$purpose, "Date and Time of Entry"=>$dateandtime);
			array_push($visitorson6,$visitorinfo);
			array_push($visitors,$visitorinfo);
		}elseif(count($visitorso6)>20){
			if(count($visitorson9)==0){
				$floorno=9;
				$tid=$floorno.$tid;
				$visitorinfo=array("tid"=>$tid,"Visitor Name"=>$firstname." ".$lastname,"Floor Number"=>$floorno,"Purpose"=>$purpose, "Date and Time of Entry"=>$dateandtime);
				array_push($visitorson9,$visitorinfo);
				array_push($visitors,$visitorinfo);
			}elseif(count($visitorson9)<20){
				$floorno=9;
				$tid=$floorno.$tid;
				$visitorinfo=array("tid"=>$tid,"Visitor Name"=>$firstname." ".$lastname,"Floor Number"=>$floorno,"Purpose"=>$purpose, "Date and Time of Entry"=>$dateandtime);
				array_push($visitorson9,$visitorinfo);
				array_push($visitors,$visitorinfo);
			}elseif(count($visitorson9)>20){
				$tid=$floorno.$tid;
				$visitorinfo=array("tid"=>$tid,"Visitor Name"=>$firstname." ".$lastname,"Floor Number"=>$floorno,"Purpose"=>$purpose, "Date and Time of Entry"=>$dateandtime,"Comment"=>"Please wait. Your number will be called shortly.");
				array_push($visitorson9,$visitorinfo);
				array_push($visitors,$visitorinfo);
			}
	}
}

$query="INSERT INTO visitors (tid,government_id,firstname,lastname,purpose,floornum)
	VALUES ($gid,$tid, $firstname, $lastname, $purpose, $floorno,$dateandtime)";
 $conn->exec($query);


}

include "ticketview.php";



?>