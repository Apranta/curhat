<?php 
	mysql_connect("localhost","root","") or die("mysql_error");
                    mysql_select_db("puding_db");
	$id=$_GET['id'];
	$query=mysql_query("delete FROM curhat WHERE id='$id'");
	if($query){

		header("location: data.php");

	}
	else{
		echo "<h3>Maaf Delete Tidak sukses";
	}
?>