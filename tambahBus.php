<?php
    include('conn.php');

    $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idBus = $_POST['id_bus'];
        $plat = $_POST['plat'];
        $status = $_POST['status'];

        $query = "INSERT INTO bus VALUES ('$idBus','$plat','$status')";
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
    <title>Tambah Bus Trans UPN</title>
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
                echo '<br><br><div>]ID Bus Trans UPN berhasil di-update</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Bus Trans UPN gagal di-update</div>';
              }

            }
           ?>
                <h2 style="margin: 30px 0 30px;">Formulir Tambah Data Bus Trans UPN</h2>
                <form action="tambahTrans.php" method="POST">
                    <div>
                        <label>ID Trans UPN</label>
                        <input type="text" placeholder="ID" name="id_trans_upn" required="required">
                    </div>
                    <div>
                        <label>PLAT</label>
                        <input type="text" placeholder="plat" name="plat" required="required">
                    </div>
                    <div>
                        <label>Status</label>
                        <input type="text" placeholder="Status" name="status" required="required">
                    </div>
                    <button type="submit">Simpan</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>