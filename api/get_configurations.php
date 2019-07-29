<?php
/**
 * Created by PhpStorm.
 * User: tseckert
 * Date: 20.10.17
 * Time: 17:58
 */

// getestet gegen: curl -i -H "Accept: application/json" "localhost:8000/api/get_configurations.php?email=dominic&password=12345678&style_id=26"

$email = $_GET["email"];
$password = $_GET["password"];
$style_id = $_GET["style_id"];

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

    $sql_configuration = "SELECT * FROM configuration WHERE style_id = '$style_id'";
    $result_configuration = $conn->query($sql_configuration);
 

    if ($result_configuration->num_rows > 0) {
      	 //echo "num_rows = '$result_configuration->num_rows' , id = '$result_configuration->id', title = '$result_configuration->img'"; 

	 $arr_confs = array();
        while($row_configuration = mysqli_fetch_assoc($result_configuration)) {
            $row_configuration["img"] = "/public/img/configurations/".$row_configuration["img"];

            $sql_conf_areas = "SELECT * FROM conf_areas WHERE conf_id = '".$row_configuration["id"]."'";

            $result_conf_areas = $conn->query($sql_conf_areas);

            $arr_conf_areas = array();
            if ($result_conf_areas->num_rows > 0) {
                while($row_conf_areas = mysqli_fetch_assoc($result_conf_areas)) {
                    //echo json_encode($row_conf_areas);
                    $arr_conf_areas[] = $row_conf_areas;
                }
            }
            $row_configuration["conf_areas"] = $arr_conf_areas;
            $arr_confs[] = $row_configuration;
        }

        $return = $arr_confs;
    }
}
else {
    die("Wrong User/Password combination.\nPlease contact your SysOp.\n");
}

echo json_encode($return);

$conn->close();
?>
