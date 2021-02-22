<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>
<?php 

    $code_pid = $_POST["code_pid"]; 
   
    $statement = mysqli_prepare($con, "SELECT code_pid FROM Refrig WHERE code_pid = ?"); 
    
     mysqli_stmt_bind_param($statement, "i", $code_pid); 
     mysqli_stmt_execute($statement); 
     mysqli_stmt_store_result($statement);//결과를 클라이언트에 저장함 
     mysqli_stmt_bind_result($statement, $code_pid);//결과를 $userID에 바인딩함 
     
     $response = array(); 
     $response["success"] = false; 

     while(mysqli_stmt_fetch($statement)){ 
         $response["success"] = true;//회원가입불가를 나타냄 
         $response["code_pid"] = $code_pid; 
     } //데이터베이스 작업이 성공 혹은 실패한것을 알려줌 

     echo json_encode($response); 

 ?> 