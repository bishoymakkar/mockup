<?php
/**
 * Created by PhpStorm.
 * User: tseckert
 * Date: 20.10.17
 * Time: 17:58
 */

// getestet gegen: curl -i -H "Accept: application/json" "localhost:8000/api/get_layouts.php?email=dominic&password=12345678&conf_area_id=22"

$email = $_GET["email"];
$password = $_GET["password"];
$conf_area_id = $_GET["conf_area_id"];

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

    $sql_layout = "SELECT * FROM layout WHERE configuration_area_id = '$conf_area_id'";

    $result_layout = $conn->query($sql_layout);

    if ($result_layout->num_rows > 0) {

        $arr_layouts = array();

        while($row_layout = mysqli_fetch_assoc($result_layout)) {
            if ($row_layout['img'] !== "")
                $row_layout['img'] = '/public/img/layouts/'.$row_layout['img'];

            $sql_layout_object = "SELECT * FROM layout_object WHERE layout_id = '" . $row_layout["id"] . "'";

            $result_layout_object = $conn->query($sql_layout_object);

            $arr_objects = array();

            if ($result_layout_object->num_rows > 0) {

                while ($row_layout_object = mysqli_fetch_assoc($result_layout_object)) {

                    $sql_object = "SELECT * FROM object WHERE id = '" . $row_layout_object["object_id"] . "'";

                    $result_object = $conn->query($sql_object);

                    if ($result_object->num_rows > 0) {
                        while ($row_object = mysqli_fetch_assoc($result_object)) {
                            if ($row_object['img'] !== "")
                                $row_object['img'] = '/public/img/objects/'.$row_object['img'];

                            $row_object['fromLayoutObject'] = $row_layout_object;
                            $arr_objects[] = $row_object;
                        }
                    }
                }
                $row_layout["objects"] = $arr_objects;

                $arr_layouts[] = $row_layout;
            }
        }

        $return = $arr_layouts;
    }
} else {
    die("Wrong User/Password combination.\nPlease contact your SysOp.\n");
}

echo json_encode($return);

$conn->close();
?>