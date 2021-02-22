<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>
<?php
    $code_pid = $_POST["code_pid"];
    $connect = 1;
    $ref_name = null;

    $response = array();

    $sql = mq("select * from User_Info where code_pid = '".$code_pid."'");
    $rep_count = mysqli_num_rows($sql);

    if($sql == 0) {
        $sql2 = mq("insert into Refrig values('".$code_pid."', '".$connect."','".$ref_name."'");
        $response["success"] = true;
    }
    else
        $response["success"] = false;

    echo json_encode($response);
?>
        