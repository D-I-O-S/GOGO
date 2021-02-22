<!--회원정보 변경을 하기 위한 비밀번호 확인 과정-->

<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>

<?php
    $user_pid = $_POST["user_pid"];
    $password = $_POST["password"];

    $statement = mysqli_prepare($con, "SELECT password FROM User_Info WHERE user_pid = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "is", $user_pid, $password); 
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);

    $response = array();
    $response["success"] = false;

    while(mysqli_stmt_fetch($statement)){
            $response["success"] = true;
    }
    
    echo json_encode($response);

?>