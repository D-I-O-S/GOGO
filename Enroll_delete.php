<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php";
    
    $enroll_pid= $_POST["enroll_pid"];

	$sql = mq("DELETE FROM Enroll WHERE enroll_pid='".$enroll_pid."'");
 
    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>
