<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>

<?php
    $code_pid = $_POST["code_pid"];
    $date = date('Y-m-d');

    $sql = mq("DELETE FROM Enroll WHERE exp_end< '".$date."' AND code_pid = '".$code_pid."'");
    
    $response = array();
    $response["success"] = true;
    
    echo json_encode($response);
?>