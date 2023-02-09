<?php
$host = 'localhost';
$username = 'project_user';
$password = 'password123';
$dbname = 'taj';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if (isset($_GET['visitor'])) {
  $visitors = htmlspecialchars($_GET['visitors']);
  $stmt = $conn->query("SELECT * FROM visitors WHERE name LIKE '%$visitors%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>

<?php if(isset($country) && !isset($lookup)):?>
  <link href="security.css" type="text/css" rel="stylesheet" />
  <table id='table'>
    <thead>
      <tr>
        <th class='1'>TID</th>
        <th class='2'>First Name</th>
        <th class='3'>Last Name</th>
        <th class='4'>Purpose Of Visit</th>
        <th class='5'>Date and Time of Entry</th>

      </tr> 
    </thead>
    <tbody>
      <?php foreach ($results as $row): ?>
        <tr>
          <td><?php echo $row['firstname'];?></td>
          <td><?php echo $row['lastname'];?></td>
          <td><?php echo $row['continent'];?></td>
          <td><?php echo $row['purpose'];?></td>
          <td><?php echo $row['dateandtime'];?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>

