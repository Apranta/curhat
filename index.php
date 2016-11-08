<?php
  session_start();
  if(isset($_SESSION['nama']))
  {
    echo "
    <script>
      window.location = 'data.php';
    </script>
    ";
  }
?>
    <head>
    <title>Login</title>
    <link type="text/css" rel="stylesheet" href="asset/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="asset/js/bootstrap.min.js"/>
    <script type="text/javascript" src="asset/js/jquery.min.js"></script>
  </head>
  <body class="container">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
         <div class="panel panel-default">
            <div class="panel-heading" align="center">
               <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
               <form accept-charset="UTF-8" role="form" action="" method="POST" >
                  <fieldset>
                  <div class="form-group">
                      <input class="form-control" placeholder="username" name="ID" type="text">
                  </div>
                  <div class="form-group">
                     <input class="form-control" placeholder="password" name="pw" type="password">
                  </div>   
                  <button class="btn btn-lg btn-success btn-block" name="login">Login >></button>
               </fieldset>
                  </form>
             </div>
         </div>
      </div>
   </div>
  </body>

<?php 
    if(isset($_POST['login']))
    {
      mysql_connect("localhost","root","") or die("mysql_error");
      mysql_select_db("puding_db");
      $Username=$_POST['ID'];
      $Password=md5($_POST['pw']);
      $pengguna=mysql_query("select * from pengguna where username='$Username' and password='$Password'");
      $data = mysql_fetch_array(mysql_query("select * from pengguna where username='$Username' and password='$Password'"));
          if (mysql_num_rows($pengguna)==1) {
              $_SESSION['id_pengguna'] = $data['id_pengguna'];
              $_SESSION['nama'] = $data['nama'];
              echo "
              <script>
              alert('Berhasil Login');
              </script>";
              header('location:data.php');
            }
          else {
            echo "<script>
                  alert('ID atau password salah');
              </script>";
            } 
    }
?>