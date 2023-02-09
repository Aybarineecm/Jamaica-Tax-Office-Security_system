<?php
if (isset($_POST['generate'])) {
    $floorNumber = $_POST['floornumber'];
    $department = $_POST['department'];
    $idNumber =$_POST ['idNumber'];
    if ($department == "Accounting") {
        $department = "A";
    } elseif ($department == "Human Resources") {
        $department = "H";
    } elseif ($department == "Auditing") {
        $department = "U";
    } else {
        $department = "X";
    }
    // comparing hash with plain text
   
    $accessCode = $floorNumber.$department.$idNumber;
    echo "<p>Your access code is 
".md5($accessCode)."</p>"

}
?>

<form action="" method="post">
     ID Number:
    <input type="number" name="idNumber" />
      <br />
    Floor Number:
    <input type="text" name="floorNumber" />
    <br />
    Department:
    <select name="department">
        <option value="Accounting">Accounting</option>
        <option value="Human Resources">Human Resources</option>
        <option value="Auditing">Auditing</option>
      
    </select>
    <br />
    <input type="submit" name="generate" value="Generate" />
</form>