<?php
$username = "thanhquan";
$password = "thanhquan123";
$database = "USERS";
$mysqli = new mysqli("localhost", $username, $password, $database);
if ($mysqli->connect_error) {
echo "Failed to connect to MySQL: (" . $mysqli->connecterrno . ") " . $mysqli->connect_error;
}
else{

if(isset($_GET['name'])){
$name = $_GET['name'];
$active = 1;
$sql_command = $mysqli->prepare("SELECT * FROM USER_INFO WHERE firstname=? AND active=?");
$sql_command->bind_param("si",$name,$active);
$sql_command->execute();
$result=$sql_command->get_result();

echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Username</th>";
echo "<th>Email</th>";
echo "<th>First Name</th>";
echo "<th>Last Name</th>";
echo "<th>Active</th>";
echo "</tr>";

if($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['username']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['firstname']."</td>";
    echo "<td>".$row['lastname']."</td>";
    echo "<td>".$row['active']."</td>";
    echo "</tr>";
}
}
}
else{echo "no result found";}
 $sql_command->close();
 $mysqli->close();
}

?>
<form action="" method="GET">
    INPUT: <input type="text" name="name"><br>
    <input type="submit">
</form>
