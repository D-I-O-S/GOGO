<?php

//header("Content-Type: text/html;charset=UTF8");

    $db = mysqli_connect("localhost","computdios","dios2020!","computdios");
    mysqli_query($db, "SET NAMES utf8");

//mysqli_query($db, "set session character_set_connection=utf8;");
  //  mysqli_query($db, "set session character_set_results=utf8;");

//    mysqli_query($db, "set session character_set_client=utf8;");
//    $db->set_charset("utf8");
    

	// localhost = DB주소, web=DB계정아이디, 1234=DB계정비밀번호, post_board="DB이름"
//	$db = new mysqli("localhost","computdios","dios2020!","computdios"); 
//	$db->set_charset("utf8");

    global $con;
    $con = new mysqli("localhost", "computdios", "dios2020!", "computdios");
    
 

	   function mq($sql)
	   {
		  global $db;

		  return $db->query($sql);
	   }
    
?>



