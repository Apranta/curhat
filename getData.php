<?php
	//http://stackoverflow.com/questions/18382740/cors-not-working-php
	if(isset($_SERVER['HTTP_ORIGIN'])){
		header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
		header("Access-Control-Allow-Credentials: true");
		header("Access-Control-Max-Age: 86400");
	}

	//Access-Control headers are received durinf OPTIONS requests
	if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
		if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])){
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
		}

		if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])){
			header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
		}

		exit(0);
	}
	// $mysqli=new mysqli("localhost","root","", "puding_db");
	$mysqli=new mysqli("br-cdbr-azure-south-a.cloudapp.net","b3492f5d51660e","da35d512", "carter");
	//http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
	$postdata = file_get_contents("php://input");
	if(isset($postdata)){
		$request = json_decode($postdata);
		$text = $request->dari;
		$text1 = $request->untuk;
		$text2 = $request->pesan;

		if($text != "" || $text1 != "" || $text2 != ""){
			$sqll = "INSERT INTO curhat VALUES ('null','$text','$text1','$text2')";
			mysqli_query($mysqli,$sqll);
			echo "Berhasil";
		}
		else{
			echo "Empty text send";
		}
	}
	else{
		echo "Not called properly with the right parameter!";
	}
?>
