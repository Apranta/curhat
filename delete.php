<?php 
	mysql_connect("br-cdbr-azure-south-a.cloudapp.net","b3492f5d51660e","da35d512") or die("mysql_error");
                    mysql_select_db("carter");
	$id=$_GET['id'];
	$query=mysql_query("delete FROM curhat WHERE id='$id'");
	if($query){

		header("location: data.php");

	}
	else{
		echo "<h3>Maaf Delete Tidak sukses";
	}
?>
