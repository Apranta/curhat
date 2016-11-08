<?php
  session_start();
  if(!isset($_SESSION['nama']))
  {
    echo "
    <script>
      window.location = 'index.php';
    </script>
    ";
  }
?>
    <head>
    <title>Data Curhat</title>
    <link type="text/css" rel="stylesheet" href="asset/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="asset/js/bootstrap.min.js"/>
    <script type="text/javascript" src="asset/js/jquery.min.js"></script>
  </head>

  <body>
    <div class="container">
          <div>
            <h2 class="title">Data Curhat Mahasiswa</h2>
          </div>
          <div class="col-md-12" align="center">
            <table class="table table-hover table-bordered" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Dari</th>
                  <th>Untuk</th>
                  <th>Pesan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php mysql_connect("localhost","root","") or die("mysql_error");
                    mysql_select_db("puding_db"); 
                    $hasil = mysql_query("SELECT * FROM curhat");
                    while($data = mysql_fetch_array($hasil)){
                    ?>
                <tr>
                  <td><?= $data['id'] ?></td>
                  <td><?= $data['dari'] ?></td>
                  <td><?= $data['untuk'] ?></td>
                  <td><?= $data['pesan'] ?></td>
                  <td><a href='delete.php?id=<?= $data['id'] ?>' class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
    </div>  
  </body>