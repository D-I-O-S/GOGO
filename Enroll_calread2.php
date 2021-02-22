<!--캘린더에서 날짜를 선택하였을 때 그 날짜에 해당하는 음식 보여주기-->
<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>

<?php
    $date = $_POST["date"];
    $code_pid = $_POST["code_pid"];

    $result = mysqli_query($con, "SELECT category, foodname, exp_start, exp_end, lo1, lo2, lo3, memo FROM Enroll WHERE exp_start = '".$date."' OR exp_end = '".$date."' AND code_pid = '".$code_pid."'");
    
    $response = array();
   // $response["success"] = true;

    while($row = mysqli_fetch_array($result)){
        array_push($response, array("category" => $row[0], "foodname" => $row[1], "exp_start" => $row[2], "exp_end" => $row[3], "lo1" => $row[4], "lo2" => $row[5], "lo3" => $row[6], "memo" => $row[7]));
    }

 echo json_encode(array("response" => $response)); 
    
?>