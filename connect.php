<?php

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
    $query = $_POST['query'];
    
    $host= "localhost";
    $dbusername= "root";

    //Database connection
    $conn = new mysqli('localhost', 'root','','book-yard');
    if($conn->connect_error){
    	echo "$conn->connect_error";
    	die("Connection Failed : ". $conn->connect_error);
    }else{
    	$stmt = $conn->prepare("insert into contact(firstname,lastname,phone,email,query) values(?, ?, ?, ?, ?)");
    	$stmt->bind_param("ssiss", $firstname,$lastname,$phone,$email,$query);
    	$execval = $stmt->execute();
    	echo "your query will be solved soon..thank you...";
    	$stmt->close();
    	$conn->close();
    }

      if(isset($_REQUEST["destination"])){
          header("Location: {$_REQUEST["destination"]}");
      }else if(isset($_SERVER["HTTP_REFERER"])){
          header("Location: {$_SERVER["HTTP_REFERER"]}");
      }else{
           /* some fallback, maybe redirect to index.php */
      }

?>