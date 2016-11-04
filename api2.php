<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=UTF-8');
header("Access-Control-Allow-Headers:origin,X-Request-With,Content-Type,Accept");



$action = $_GET['action'];

	switch ($action) {
				case 'ambil'://untuk mengambil data
				// $host = "ap-cdbr-azure-southeast-b.cloudapp.net";
				// $user = "ba2eec7d642c24";
				// $pass = "98e73167";
				// $db = "puding_db";
				// $host = "localhost";
				// $user = "root";
				// $pass = "";
				// $db = "puding_db";
				$conn = new mysqli("br-cdbr-azure-south-a.cloudapp.net","b3492f5d51660e","da35d512", "carter");
						$result = $conn->query("SELECT * FROM curhat order by id desc");

						$outp = "";
						while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
						    if ($outp != "") {$outp .= ",";}
						    $outp .= '{"pesan":"'. $rs["pesan"] . '",';
						    $outp .= '"untuk":"' . $rs["untuk"] . '",';
						    $outp .= '"dari":"'  . $rs["dari"] . '"}';
						}
						$outp ='['.$outp.']';
						$conn->close();

						echo($outp);
					break;
				case 'kirim':
					$postdata = file_get_contents("php://input");
					$request = json_decode($postdata);
					
					$untuk = $request->permasalahan;
					$dari = $request->aja;
					$pesan = $request->kategori;

					// $con = mysql_connect("ap-cdbr-azure-southeast-b.cloudapp.net","ba2eec7d642c24","98e73167") or die(mysql_error());
					// mysql_select_db('puding_db',$con);
					$host = "localhost";
					$user = "root";
					$pass = "";
					$db = "puding_db";
					$conn = new mysqli("$host", "$user", "$pass", "$db");

					if ($pesan=='') {
						echo "gagal";
					}
					else{
					$qry_em = 'INSERT INTO curhat (id,dari,untuk,pesan) VALUES ("","'.$dari.'","'.$untuk.'","'.$pesan.'")';
					$qry_res = mysqli_query($qry_em);
					}
					break;
				case 'variable':
					# code...
					break;
				default:
				break;
			}

?>