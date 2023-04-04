<?php
    include('conn.php');

    $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idDriver = $_POST['id_driver'];
        $nama = $_POST['nama'];
        $noSIM = $_POST['no_sim'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO driver VALUES ('$idDriver','$nama','$noSIM','$alamat')";
        echo $query;
        $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'okay';
        } else {
            $status = 'error';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Trans UPN</title>
</head>
<body>
    <nav>
      <a href="#">Data Trans UPN</a>
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
                echo '<br><br><div>]ID Driver Trans UPN berhasil di-perbarui</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Driver Trans UPN gagal di-perbarui</div>';
              }

            }
           ?>
                <h2 style="margin: 30px 0 30px;">Formulir Tambah Data Driver Trans UPN</h2>
                <form action="tambahDriver.php" method="POST">
                    <div>
                        <label>ID Driver</label>
                        <input type="text" placeholder="ID" name="id_driver" required="required">
                    </div>
                    <div>
                        <label>Nama</label>
                        <input type="text" placeholder="Nama" name="nama" required="required">
                    </div>
                    <div>
                        <label>NO SIM</label>
                        <input type="text" placeholder="NO SIM" name="no_sim" required="required">
                    </div>
                    <div>
                        <label>Alamat</label>
                        <input type="text" placeholder="Alamat" name="alamat" required="required">
                    </div>
                    <button type="submit">Simpan</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>