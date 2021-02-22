<!--Board 데이터 베이스의 내용 수정(title, contents)-->
<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>

<?php

    $post_pid = $_POST['post_pid'];
    $title = $_POST['title'];
    $contents = $_POST["contents"];
    $date_time = date('Y/m/d H:i:s',time());

    $statement = mysqli_prepare($con, "UPDATE Board SET title = ?, contents = ?, date_time = ? WHERE post_pid = '".$post_pid."'");
    mysqli_stmt_bind_param($statement, "sss", $title, $contents, $date_time);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>

