<?php 

	if (isset($_SERVER['HTTP_ORIGIN'])) {
	    header("Access-Control-Allow-Origin: *");
	    header('Access-Control-Allow-Credentials: true');
	    header('Access-Control-Allow-Headers: X-App-Token, Content-Type');
   	}

	// get data
	$requestBody = json_decode(file_get_contents('php://input'), true);
	//set data yang uda diambil
	$to = $requestBody['to'];
	$subject = $requestBody['subject'];
	$bodyMessage = $requestBody['bodyMessage'];

	$header = "From:abc@gmail.com \r\n";
	$header .= "Cc:afgh@gmail.com \r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html\r\n";
	//select db
	include 'config/db_con.php';
	$our_server = 'smtp.gmail.com';
	ini_set("SMTP", $our_server );
	ini_set("smtp_port", 465 );
	

	$return = null;
	$sendmEail = mail($to,$subject,$bodyMessage,$header);
	if(!empty($requestBody)){
		$query = "INSERT INTO ms_email(to, header, bodyMessage) VALUES('".$to."','".$subject."','".$bodyMessage."')";

		$data = $conn->query($query);
		$return = 'true';
	} else{
		$return = 'false';
	}

	echo json_encode($return);

?>