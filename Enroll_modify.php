<!--Enroll_modify.php 식재료 등록정보를 수정한다.-->
<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php";
    
    // enroll pid를 받는다.
    $enroll_pid = $_POST["enroll_pid"];
    
    // 수정할 필드
    $category = $_POST["category"];
    $foodname = $_POST["foodname"];
    $exp_start = $_POST["exp_start"];
    $exp_end = $_POST["exp_end"];
    $lo1 = $_POST["lo1"];
    $lo2 = $_POST["lo2"];
    $lo3 = $_POST["lo3"];
    $memo = $_POST["memo"];

    // Enroll에다가 수정된 정보 업데이트
    $statement = mysqli_prepare($con, "UPDATE Enroll SET category = ?, foodname = ?, exp_start = ?, exp_end = ?, lo1 = ?, lo2=?, lo3 =?, memo = ? WHERE enroll_pid = '".$enroll_pid."'");
    mysqli_stmt_bind_param($statement, "ssssssss", $category, $foodname, $exp_start, $exp_end, $lo1, $lo2, $lo3, $memo);
    mysqli_stmt_execute($statement);

    // 성공메시지 보냄
    $response = array();
    $response["success"] = true;
    
    echo json_encode($response);
?>
    