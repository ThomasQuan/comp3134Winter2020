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
$sql_command = "SELECT * FROM USER_INFO WHERE firstname='".$name."' AND active=1";
echo $sql;
$result = $mysqli->query($sql_command);
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
$mysqli->close();
}
?>
<form action="" method="GET">
    INPUT: <input type="text" name="name"><br>
    <input type="submit">
</form>

