<?php
session_start();
$_SESSION['logged-in'] = false;

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
$host = 'localhost';
$dbusername = 'project_user';
$dbpassword = 'password123';
$dbname = 'TAJ';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $dbusername, $dbpassword);

if(isset($_POST["login_username"])) {
	$password = filter_var($_POST['login_password'], FILTER_SANITIZE_STRING);
	$username = filter_var($_POST['login_username'], FILTER_SANITIZE_STRING);
	$radio = filter_var($_POST['login_type'], FILTER_SANITIZE_STRING);
	if ($radio == "Man") {
		$query = "SELECT * FROM managers WHERE managers.username = '{$username}'";
		$stmt = $conn->query($query);
		$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
		
		if (sizeof($results) == 1) {
			if ($results[0]["password"] ==  $password) {
				$_SESSION['logged-in'] = true;
				$_SESSION['login-type'] = $radio;
				$_SESSION['userid'] = $results[0]['id'];
				$_SESSION['useremail'] = $email;
				echo "manager log in";
				}
			}
		
		}
	}
	elseif {
		$query = "SELECT * FROM security WHERE security.username = '{$username}'";
		$stmt = $conn->query($query);
		$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
		
		if (sizeof($results) == 1) {
			if ($results[0]["password"] ==  $password) {
				$_SESSION['logged-in'] = true;
				$_SESSION['login-type'] = $radio;
				$_SESSION['userid'] = $results[0]['id'];
				$_SESSION['useremail'] = $email;
				echo "security log in";
			}
		
		}
	}
}

$conn = null;

?>