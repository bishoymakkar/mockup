<?php
/**
 * Created by PhpStorm.
 * User: tseckert
 * Date: 20.10.17
 * Time: 17:58
 */

// getestet gegen: curl -i -H "Accept: application/json" "localhost:8000/api/get_styles.php?email=dominic&password=12345678"

$email = $_GET["email"];
$password = $_GET["password"];

header("Content-type: application/javascript");


$db_server = 'localhost';
$db_benutzer = 'root';
$db_passwort = 'c7GYCnGEg4k7';
$db_name = 'mockup';

# Verbindungsaufbau
$conn = new mysqli($db_server, $db_benutzer, $db_passwort, $db_name);
if ($conn->connect_error) {
    die("database-Error: " . $conn->connect_error);
}

$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
//$sql = "SELECT * FROM user";

$result_user = $conn->query($sql);

$return = NULL;
if ($result_user->num_rows > 0) {
    $row_user = mysqli_fetch_assoc($result_user);

    $sql_style_user = "SELECT * FROM style_user WHERE user_id = '".$row_user["id"]."'";

    $result_style_user = $conn->query($sql_style_user);

    if ($result_style_user->num_rows > 0) {
        $arr_style = array();
        while($row_style_user = mysqli_fetch_assoc($result_style_user))
        {
            $sql_style = "SELECT * FROM style WHERE id = '".$row_style_user["style_id"]."'";

            $result_style = $conn->query($sql_style);

            if ($result_style->num_rows > 0) {
                while($row_style = mysqli_fetch_assoc($result_style))
                {
                    if ($row_style['img'] !== "")
                        $row_style['img'] = '/public/img/styles/'.$row_style['img'];
                    $arr_style[] = $row_style;

                }
            }
        }
        $return = $arr_style;
    }
    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//    }
} else {
    die("Wrong User/Password combination.\nPlease contact your SysOp.\n");
}

echo json_encode($return);

$conn->close();
?>