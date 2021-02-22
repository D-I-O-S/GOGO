<!--Enroll_write.php 식재료 Enroll db에 저장한다.-->
<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>

<?php
    
    $user_pid = $_POST["user_pid"];
    $enroll_pid = $_POST["enroll_pid"];
    $code_pid = $_POST["code_pid"];
    $category = $_POST["category"];
    $foodname = $_POST["foodname"];
    $exp_start = $_POST["exp_start"];
    $exp_end = $_POST["exp_end"];
    $lo1 = $_POST["lo1"];
    $lo2 = $_POST["lo2"];
    $lo3 = $_POST["lo3"];
    $memo = $_POST["memo"];
    
    // 입력된 값 가져와 insert문으로 db에 저장한다.
    $statement = mysqli_prepare($con, "INSERT INTO Enroll VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($statement, "iiissssssss", $enroll_pid, $user_pid, $code_pid, $category, $foodname, $exp_start, $exp_end, $lo1, $lo2, $lo3, $memo);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;
    $response["enroll_pid"] = $enroll_pid;

    // 성공메시지와 함께 enroll_pid를 준다.
//    while(mysqli_fetch_array($statement)){
//        $response["success"] = true;
//    }

    echo json_encode($response);

?>