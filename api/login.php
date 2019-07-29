
<?php
	header('Content-Type: application/json');
	//Get JSON in the form of
	//{"email" : "Username", "password" : "password entered"}
	//Returns JSON of the form
	//[{"Status" : 200}]
	//OR
	//[{"Status" : 409, "Message" : "error"}]


$json = file_get_contents('php://input');
$decodedJSON = json_decode($json);

$db_server = 'localhost';
$db_username= 'root';
$db_password = 'c7GYCnGEg4k7';
$db_name = 'mockup';

$conn =  new mysqli($db_server, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("database-Error: " . $conn->connect_error);
}

$sql = "SELECT * FROM user WHERE email = '$decodedJSON->email' AND password = '$decodedJSON->password'";
$result_user = $conn->query($sql);
if ($result_user->num_rows == 0) {
	die("[{'Status' : 409, 'Message' : 'Wrong User/Password combination.\nPlease contact your SysOp.\n'}]");
	}
$conn->close();
echo "[{'Status' : 200}]";
exit;
?>
