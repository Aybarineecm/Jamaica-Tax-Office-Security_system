
<?php
$servername  = "localhost";
$username = "root";
$password = "";
$dbname = "taj";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//get the form data
$name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
$time = filter_var($_POST['time'],FILTER_SANITIZE_STRING);

//check if the employee works there
$namecheck_sql = "SELECT name FROM Employees WHERE name = ?";
$namecheck = $conn->prepare($namecheck_sql);
$namecheck->bind_param("s",$name);
$namecheck->execute();
$namecheck->store_result();

//if employee works there, register the time and date
if($namecheck->num_rows > 0){
    $regtime_sql = "INSERT INTO ClockIns (name,time) VALUES (?,?)";
    $regtime = $conn->prepare($regtime_sql);
    $regtime->bind_param("ss",$name,$time);
    $regtime->execute();
    echo "Time and date registered!";
} else {
    echo "Employee is not registered!";
}

$conn->close();
?>