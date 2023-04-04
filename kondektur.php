<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>UTS PEMWEB</title>
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">
  </head>

  <body>
    <nav>
      <a href="#">Bus Trans UPN</a>
    </nav>
    <div>
      <div>
        <nav>
          <div>
            <ul style="margin-top:100px;">
              <li>
                <a href="UTS.php">Data Trans Bus UPN</a>
              </li>
              <li>
                <a href="driver.php">Data Driver</a>
              </li>
              <li>
                  <a href="bus.php">Data Bus</a>
              </li>
              <li>
                  <a href="kondektur.php">Data Kondektur</a>
              </li>
              <li>
                  <a href="tambahTrans.php">Tambah Data Trans UPN</a>
              </li>
              <li>
                  <a href="tambahKondektur.php">Tambah Data Kondektur</a>
              </li>
              <li>
                  <a href="tambahDriver.php">Tambah Data Driver</a>
              </li>
              <li>
                  <a href="tambahBus.php">Tambah Data BUS</a>
              </li>
              <li>
                  <a href="gaji.php">Menghitung Gaji</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><br><div>]ID Kondektur berhasil di-perbarui</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Kondektur gagal di-perbarui</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Tabel Kondektur Trans UPN</h2>
          <div>
            <table border="1">
              <thead>
                <tr>
                  <th>ID Kondektur</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM kondektur";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td>
                      <a href="<?php echo "deleteKondektur.php?id=".$data['id_kondektur']; ?>"> Delete</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "updateKondektur.php?id=".$data['id_kondektur']; ?>"> Update</a>
                      
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

  </body>
</html>
