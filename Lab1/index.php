<?php
/*  Basic Syntax 

$my_name= "Gabe";
$my_age = 28;
$am_awake = true;

$addition = $my_name . $am_awake;

var_dump($my_name);

$numbers = [1,2,3,4];

foreach($numbers as $i){
 echo($i);
 echo("<h2>{$i}<h2>");
}
*/

$title = "Laboratory 1";

// CONNECT TO SERVER

$servername = "localhost";
$username = "root";
$password = "";
$db = "todo_application";

$stateofconnection="";
$dbResponse="";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    $stateofconnection= "Connected successfully";
}

$sql = "SELECT id, title, descriptionn,statuss FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $dbResponse= "id: " . $row["id"]. "<br>" . "Name: " . $row["title"]. "<br>" . "Description: " . $row["descriptionn"]. "<br>" . "Status: ". $row["statuss"]. "<br>";
  }
} else {
    $dbResponse= "0 results";
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script type="text/javascript" src="script.js"></script>

</head>
<body>
<h1><?= $title ?></h1>

<i><h4><?= $stateofconnection ?></h4></i>
<h2><?= $dbResponse?></h2>

<p id=javatestt><p>
</body>
</html>